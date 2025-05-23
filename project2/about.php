<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="author" content="Remy Amor, William Anthony, Amanuial Ashagrie">
     <meta name="description" content="About page for Dream Team group">
     <meta name="keywords" content="about, group, project, swinburne">
     <title>Dream Team IT Solutions - About</title>
     <!-- link to styles.css -->
     <link rel="stylesheet" href="styles/styles.css">

     <!-- link to responsive css -->
     <link rel="stylesheet" href="styles/responsive.css">

     <!-- link to page specific css -->
     <link rel="stylesheet" href="styles/about.css">
</head>
<body>
     <?php include 'header.inc'; ?>
     <main class="about_grid">
          <div class="headings_and_intro">
               <h1>Our Group</h1>
               <h2>Meet the Dream Team</h2>
               <p>We attend the <strong>2:30pm Friday class</strong></p>
          </div>
          <div class="student_id_list">
               <h3>Our Tutor</h3>
               <p>Razeen Hashmi</p>
               <ul>
                    <li>William Anthony
                         <ul>
                              <li>105934104</li>
                         </ul>
                    </li>
                    <li>Remy Amor
                         <ul>
                              <li>105914423</li>
                         </ul>
                    </li>
                    <li>Amanuial Ashagrie
                         <ul>
                              <li>105871858</li>
                         </ul>
                    </li>
               </ul>
          </div>
          <div class="group_image">
               <img id="group_image" src="images/about_me_group_photo.jpg" alt="a group photo of Aman, Remy, and William">
          </div>
          <div class="member_info" >
               <h3>Member Contributions</h3>
               <dl class="definition-list">
                    <dt>Remy</dt>
                    <dd>HTML and CSS for apply.html and about.html, group coordinator</dd>
                    <dd>Coded and styled all manage pages, which handled eoi records display and management, manager login, signup</dd>
                    <dd>Handled enhancement requirements such as locking user out after 3 incorrect logins, sorting records</dd>
                    <dd>Added image to index.php and adjusted styles for apply.php</dd>
                    <dd>Coded settings.php setting up connection to database</dd>
                    
                    <dt>William</dt>
                    <dd>HTML and CSS for jobs.html, logo design</dd>

                    <dt>Amanuial</dt>
                    <dd>HTML and CSS for the homepage, header and footer</dd>
               </dl>
          </div>
          <div class="interests_table">
               <table id="interests_table">
                    <caption>Our Interests</caption>
                    <thead>
                         <tr>
                              <th>Name</th>
                              <th>Interest #1</th>
                              <th>Interest #2</th>
                         </tr>
                    </thead>
                    <tr>
                         <th>Remy</th>
                         <td>Music</td>
                         <td>Exercise</td>
                    </tr>
                    <tr>
                         <th>William</th>
                         <td>Volleyball</td>
                         <td>PCs</td>
                    </tr>
                    <tr>
                         <th>Aman</th>
                         <td>Drums</td>
                         <td>Tennis</td>
                    </tr>
               </table>
          </div>
     </main>
     <?php include 'footer.inc'; ?>
</body>
</html>
