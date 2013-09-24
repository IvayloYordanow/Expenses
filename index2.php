<?php
	$title='Списък';
	include 'includes/header.php';
	require 'includes/constants.php';
?>
    <form method="POST">
		<button><a href="form.php">Добави нов разход</a></button>
		
        <select name="filter" >
			<?php
				$filter=null;
				if (isset($_POST['filter'])) {
					$filter = $_POST['filter'];
				}
				foreach ($types as $key => $value) {

					if($key == $filter) {
						$selected = 'selected';
					}
					else {
						$selected = '';
					}

					echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
				}
			?>
        </select> 
        <input type="submit" value="Филтър" />
    </form>

<table border="1">
	<tr>
		<th>Дата</th>
		<th>Име</th>
		<th>Сума</th>
		<th>Вид</th>

		<?php
			$total=0;
			if (file_exists('data.txt')) {
				$result = file('data.txt');
				if ($_POST) {
					$filter = (int)$_POST['filter'];
				}
					foreach ($result as $value) {
						$columns = explode('!', $value);

						if (($filter !=0) && ($filter != (trim($columns[3])))) {
							continue;
						}
						echo   '<tr>
									<td>'.$columns[0].'</td>
									<td>'.$columns[1].'</td>
									<td>'.$columns[2].'</td>
									<td>'.$types[trim($columns[3])].'</td>
								</tr>';
						$total+=$columns[2];
					}
			}
		?>
		<tr>
			<td colspan="4">
				<?='Общо: '.$total.' лв.';?>
			</td>
		</tr>
	</tr>
</table>

<?php
	include 'includes/footer.php';
?>
