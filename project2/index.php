<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="author" content="Remy Amor, William Anthony, Amanuial Ashagrie">
     <meta name="description" content="Homepage of Dream Team IT Solutions">
     <meta name="keywords" content="homepage, IT, software, software development, network, network administrator, jobs">
     <title>Dream Team IT Solutions - Home Page</title>
     
     
     <!-- link to styles.css -->
     <link rel="stylesheet" href="project1/styles/styles.css">
     <link rel="stylesheet" href="styles/styles.css">
     <!-- <link rel="stylesheet" href="styles/aman_styles.css"> -->

     <!-- link to responsive css -->
     <link rel="stylesheet" href="styles/responsive.css">
</head>
<body>
     <!-- Header section with company name and navigation - Aman -->
     <?php include 'header.inc'; ?>
     
     <main>
          <!-- Introduction paragraph -->
          <p>At Dream Team IT Solutions, we don’t just embrace innovation—we create it. As a forward-thinking IT company, we specialize in developing cutting-edge technology solutions that drive businesses forward. From custom software development to AI-driven automation, we empower organizations with scalable, secure, and intelligent solutions tailored to their needs.</p>

          <!-- Use of Chatgpt - How can I use div to float these two sections-->
         <div id="about-sections">
               <div id="who_we_are">
                    <h2>Who We Are</h2>
                    <p>Dream Team IT Solutions was founded with a mission to redefine the digital landscape. Our team of expert developers, engineers, and consultants work collaboratively to solve complex challenges, delivering technology that transforms industries. We believe in the power of technology to simplify processes, enhance productivity, and unlock new opportunities.</p>
               </div>
               <div id="mission">
                    <h2>Our mission</h2>
                    <p>To drive digital transformation through innovation, helping businesses harness the full potential of technology. We aim to create solutions that are not just efficient and secure but also future-proof, enabling businesses to thrive in an evolving digital world.</p>
               </div>
         
               <br>
               <h1 id="heading_toclear">What we do? </h1>

               <!-- List of services offered -->
               <ul class="services-list">
                    <li><span>🖥️</span> Custom Software Development – Scalable, high-performance applications designed for business growth.</li>
                    <li><span>☁️</span> Cloud Solutions – Secure, cost-effective cloud infrastructure for seamless operations.</li>
                    <li><span>🔐</span> Cybersecurity Services – Cutting-edge security measures to safeguard data and systems.</li>
                    <li><span>🤖</span> AI & Automation – Intelligent automation solutions that boost efficiency and innovation.</li>
                    <li><span>📊</span> IT Consultancy – Expert guidance to navigate digital transformation with confidence.</li>
               </ul>
               

               <h2>Why Choose Us? </h2>

               <!-- Use of ChatGPT - Helped design and style this 4x4 visual value grid -->
               <div class="value-grid">
                    
                    <div>🌍 <strong>Innovation-Driven</strong><br>We push boundaries to develop the most advanced IT solutions.</div>
                    <div>🚀 <strong>Client-Centric Approach</strong><br>We tailor solutions to meet specific business needs.</div>
                    <div>💡 <strong>Expert Team</strong><br>Our skilled professionals bring experience, creativity, and technical excellence.</div>
                    <div>📈 <strong>Proven Success</strong><br>We’ve helped businesses streamline operations, enhance security, and scale efficiently.</div>
               </div>
          </div>
     </main>

     <!-- Footer with copyright and external link - Aman -->

     <?php include 'footer.inc'; ?>
</body>
</html>
