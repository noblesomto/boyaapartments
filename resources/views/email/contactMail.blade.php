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

<h2>A user with the details below made a booking on the website</h2>

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
    <th>Phone:</th>
    <td>{{ $details['phone'] }}</td>
  </tr>
  <tr>
  <tr>
    <th>Room Type:</th>
    <td>{{ $details['room'] }}</td>
  </tr>

  <tr>
    <th>Apartment:</th>
    <td>{{ $details['apartment'] }}</td>
  </tr>
  <tr>
    <th>Checkin:</th>
    <td>{{ date('j F Y', strtotime($details['checkin'])); }}</td>
  </tr>
  <tr>
    <th>Checkout:</th>
    <td>{{ date('j F Y', strtotime($details['checkout'])); }}</td>
  </tr>
  <tr>
    <th>Amount Paid:</th>
    <td>₦{{ number_format($details['amount'], 0, '.', ',') }}</td>
  </tr>
  
</table>

</body>
</html>
