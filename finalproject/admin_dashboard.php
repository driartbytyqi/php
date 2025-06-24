<style>
/* Basic reset */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Navbar container */
.navbar {
  background-color: #007bff;
  overflow: hidden;
  font-family: Arial, sans-serif;
}

/* Navbar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

/* Hover effect */
.navbar a:hover {
  background-color: #0056b3;
}

/* Right-aligned section */
.navbar .right {
  float: right;
}

/* Responsive: stack links vertically on small screens */
@media screen and (max-width: 600px) {
  .navbar a, .navbar .right {
    float: none;
    width: 100%;
    text-align: left;
  }
}
</style>

<div class="navbar">
  <a href="admin_dashboard.php">Dashboard</a>
  <a href="add.php">Add Listing</a>
  <a href="listings.php">Manage Listings</a>
  <a href="admin_users.php">Manage Users</a>
  <div class="right">
    <a href="logout.php">Logout</a>
  </div>
</div>
