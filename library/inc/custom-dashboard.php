<?php
	// Ordre des widgets dans le dashboard
	add_action('wp_dashboard_setup', 'set_dashboard_widget_order', 100);
	function set_dashboard_widget_order() {
		global $wp_meta_boxes;
		$wp_meta_boxes['dashboard']['normal']['core'] = array(
			'welcome_dashboard'      => array('id' => 'welcome_dashboard', 'title' => 'Bienvenue', 'callback' => 'display_welcome_message', 'args' => array()),
			'google_sheet_dashboard' => array('id' => 'google_sheet_dashboard', 'title' => 'Suivi de maintenance 2025', 'callback' => 'display_google_sheet_data', 'args' => array()),
			'custom_git_commits'     => array('id' => 'custom_git_commits', 'title' => 'Modifications récentes', 'callback' => 'render_custom_git_commits_dashboard_widget', 'args' => array()),
		);
	}


	// Verrouillage du layout du dashboard
	add_action('admin_head-index.php', 'lock_dashboard_layout');
	function lock_dashboard_layout() {
		if (current_user_can('edit_dashboard')) {
			echo '<style>
				#dashboard-widgets .postbox-container { min-height: 0 !important; }
				.postbox .handlediv, .postbox h2.hndle { cursor: default !important; }
				.postbox .hndle { pointer-events: none; }
				.postbox .handle-actions, #screen-options-link, #screen-options-wrap { display: none !important; }
			</style>';
		}
	}


	////////////////////////////
	// Widget Bienvenue
	////////////////////////////
	function display_welcome_message() {
		$current_user = wp_get_current_user();
		$first_name = $current_user->user_firstname;
		if (empty($first_name)) {
			$first_name = esc_html($current_user->display_name);
		}
		echo "
		<div class='inside-content'>
			<strong>Bonjour $first_name, content de vous revoir 👋</strong>
			<p>Bienvenue sur le back-office de votre site internet.</p>
		</div>";
	}


	////////////////////////////
	// Données Google Sheet
	////////////////////////////
	function get_google_sheet_json() {
		$url = 'https://docs.google.com/spreadsheets/d/1gVsT9va2blpaniX2vXcEKPgSPPylqJ2J1DVKf5V--Pk/gviz/tq?gid=1324108930&tqx=out:json';
		$response = wp_remote_get($url);

		if (is_wp_error($response)) return null;

		$json = wp_remote_retrieve_body($response);
		$json = str_replace(["/*O_o*/", "google.visualization.Query.setResponse("], '', $json);
		$json = substr($json, 0, -2);
		return json_decode($json, true);
	}

	function add_google_sheet_dashboard_widget() {
		$year = date('Y');
		wp_add_dashboard_widget(
			'google_sheet_dashboard',
			"Récapitulatif du temps passé sur le site en $year",
			'display_google_sheet_data'
		);
	}	
	add_action('wp_dashboard_setup', 'add_google_sheet_dashboard_widget');

	function display_google_sheet_data() {
		$data = get_google_sheet_json();

		if (!$data || !isset($data['table']['rows'])) {
			echo '<div class="inside">Aucune donnée disponible.</div>';
			return;
		}

		$totals = [];

		echo '<table style="width:100%; border-collapse: collapse;">';
		echo '<tr>
				<th style="width: 10%;">Date</th>
				<th style="width: 50%">Tâche effectuée</th>
				<th style="width: 10%">Temps passé</th>
				<th style="width: 10%">Prix</th>
				<th style="width: 20%">Facturé</th>
			  </tr>';
	
			  foreach ($data['table']['rows'] as $row) {
				$date_raw = isset($row['c'][0]['v']) ? $row['c'][0]['v'] : '';
				$task   = isset($row['c'][1]['v']) ? esc_html($row['c'][1]['v']) : '-';
				$time   = isset($row['c'][2]['v']) ? esc_html($row['c'][2]['v']) : '-';
				$price  = isset($row['c'][3]['v']) ? esc_html($row['c'][3]['v']) : '-';
				$billed = isset($row['c'][4]['v']) ? esc_html($row['c'][4]['v']) : '-';
			
				if (preg_match('/Date\((\d+),(\d+),(\d+)\)/', $date_raw, $matches)) {
					$year  = $matches[1];
					$month = $matches[2] + 1;
					$day   = $matches[3];
					$date  = sprintf("%02d/%02d/%04d", $day, $month, $year);
				} else {
					$date = $date_raw ?: '-';
				}
			
				if ($date === '-' || stripos($date, 'Total') !== false) {
					$totals[] = ['date' => $date, 'time' => $time, 'price' => $price];
					continue;
				}
			
				$billed_class = strtolower($billed) === 'oui' ? 'billed--ok' : 'billed--nonok';
			
				echo "
				<tr>
					<td style='width: 10%;'>$date</td>
					<td style='width: 50%;'>$task</td>
					<td style='width: 10%;'>$time</td>
					<td style='width: 10%;'>$price €</td>
					<td style='width: 20%;'><span class='billed $billed_class'>$billed</span></td>
				</tr>";
			}

		// Affichage des totaux calculés à la fin
		if (!empty($totals)) {
			echo '<tfoot>';
			foreach ($totals as $total) {
				$label = $total['date'];

				if (stripos($label, 'HT') !== false) {
					$label = 'Total HT';
				} elseif (stripos($label, 'TVA') !== false) {
					$label = 'Total TVA';
				} elseif (stripos($label, 'TTC') !== false) {
					$label = 'Total TTC';
				} else {
					static $i = 0;
					$map = ['Total HT', 'Total TVA', 'Total TTC'];
					$label = $map[$i] ?? $label;
					$i++;
				}

				$time_text = ($total['time'] !== '-' && !empty($total['time'])) ? $total['time'] . ' jour' : '';

				echo "<tr style='font-weight: bold; background-color: #f2f2f2;'>
						<td style='width:27%'>$label</td>
						<td style='width:23%'>$time_text</td>
						<td style='width:45%'>{$total['price']} €</td>
					</tr>";
			}
			echo '</tfoot>';
		}

		echo '</table>';
	}


	////////////////////////////
	// Affichage des modifications via Git
	////////////////////////////
	function render_custom_git_commits_dashboard_widget() {
		$token = defined('GITHUB_TOKEN') ? GITHUB_TOKEN : null;
		$api_url = 'https://api.github.com/repos/20h20/genius/commits?sha=develop&per_page=5';

		if (!$token) {
			echo '<p>Token GitHub non défini.</p>';
			return;
		}

		$response = wp_remote_get($api_url, [
			'headers' => [
				'User-Agent' => 'WordPress-GitHub-Dashboard',
				'Authorization' => 'token ' . $token,
			],
		]);

		if (is_wp_error($response)) {
			echo '<p>Erreur lors de la récupération des commits.</p>';
			return;
		}

		$code = wp_remote_retrieve_response_code($response);
		if ($code !== 200) {
			echo '<p>Erreur HTTP ' . esc_html($code) . ' reçue depuis GitHub.</p>';
			return;
		}

		$body = wp_remote_retrieve_body($response);
		$commits = json_decode($body, true);

		if (!is_array($commits)) {
			echo '<p>Erreur dans les données du commit.</p>';
			return;
		}

		echo '<ul class="git-list">';
		foreach ($commits as $commit) {
			if (!isset($commit['sha'], $commit['commit']['message'], $commit['commit']['author']['date'])) {
				continue;
			}
			$sha = substr($commit['sha'], 0, 7);
			$message = $commit['commit']['message'];
			$date = date('d/m/Y H:i', strtotime($commit['commit']['author']['date']));
			$url = $commit['html_url'];

			echo '<li class="list-el">';
			echo '<em class="el-date">Le ' . esc_html($date) . '</em>';
			echo '<span class="el-infos"><code>' . esc_html($sha) . '</code> <strong class="el-title">' . esc_html($message) . '</strong></span><br>';
			echo '</li>';
		}
		echo '</ul>';
	}
?>