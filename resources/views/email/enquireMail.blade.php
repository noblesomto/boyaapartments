<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>A user with the details below made an Equiry on the website</h2>

<table style="width:100%">

  <tr>
    <th>Name:</th>
    <td>{{ $details['name'] }}</td>
  </tr>
   <tr>
    <th>Email:</th>
    <td>{{ $details['email'] }}</td>
  </tr>
  <tr>
  <tr>
    <th>Phone:</th>
    <td>{{ $details['phone'] }}</td>
  </tr>

   <tr>
    <th>Subject:</th>
    <td>{{ $details['subject'] }}</td>
  </tr>

   <tr>
    <th>Message:</th>
    <td>{{ $details['message'] }}</td>
  </tr>
  
</table>

</body>
</html>
