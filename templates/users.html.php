<h1 class="text-center">Lista użytkowników</h1>
<div class="container">
<?php
$html = '<table class="table">';
$html .= '<tr><th>ID</th><th>imię i nazwisko</th><th>email</th><th class="text-center">aktywność</th></tr>';
$sql = "SELECT * FROM users";
$res = $db->query($sql);
if ($res->num_rows > 0)
{
	while ($row = $res->fetch_assoc())
	{
        $name = $row['user_name'] . ' ' . $row['user_surname'];
		$html .= '<tr>';
        $html .= '<td>' . $row['id'] . '</td>';
        $html .= '<td>' . $name . '</td>';
        $html .= '<td>' . $row['user_email'] . '</td>';
        $html .= '<td class="text-center">' . showStatusIcon($row['active']) . '</td>';
        $html .= '</tr>';
	}
    $html .= '</table>';
    echo $html;
}
else
{
    echo '<p class="text-danger">Brak rekordów</p>';
}
?>
</div>