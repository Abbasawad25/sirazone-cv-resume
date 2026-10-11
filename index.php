<?php include('./app/config.php'); ?>
<!doctype html>
<html lang="<?php echo $lang['lang'] ?>" dir="">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $lang['site_title'].  " - ".  $lang['home'] ?></title>
     <meta name="description" content="<?php echo $lang['site_description'] ?>" />
    <meta name="keywords" content="<?php echo $lang['site_keywords'] ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="title" content="<?= $lang['site_title']?>">
    <meta property="og:site_name" content="<?= $lang['site_name']?>"/>
    <meta property="og:image" content="<img src="uploads/images/site/logo.png" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta property="og:locale" content="<?php echo $lang['lang'] ?>"/>
    <meta property="og:title" content="<?= $lang['site_title']?>"/>
    <meta property="og:description" content="<?php echo $lang['site_description'] ?>"/>
    <meta property="og:image" content="<img src="uploads/images/site/logo.png"/>
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="twitter:site" content="<?= ['site_name']?>"/>
    <meta name="twitter:title" content="<?= $lang['site_title']?>"/> 
    <meta name="twitter:description" content="<?= $lang['site_description']?>"/>
    <meta name="twitter:image" content="<img src="uploads/images/site/logo.png" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="uploads/images/site/logo.png">
    <link rel="stylesheet" href="dist/output.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
    <style>
      * {
        scroll-behavior: smooth;
      }
      .bg-white-btn {
        padding: 8px 15px;
        background-color: white;
        border-radius: 4px;
        border: 1px solid #1a91f0;
        color: #1a91f0;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
      }
      .bg-white-btn:hover {
        color: #0c4e85;
      }
      .bg-blue-btn {
        padding: 8px 15px;
        background-color: #1a91f0;
        border-radius: 4px;
        border: 1px solid #1a91f0;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
      }
      .bg-blue-btn:hover {
        color: white;
        background-color: #1376c6;
      }
      #nested-div {
        display: flex;
        flex-direction: column;
        animation: slideImages 23s linear infinite; /* Adjust animation duration as needed */
      }
      @keyframes slideImages {
        0% {
          transform: translateY(0);
        }
        100% {
          transform: translateY(-100%);
        }
      }
      #cards {
        box-shadow: 0 0 10px 0 rgba(163, 178, 212, 0.3);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      }
      video::-webkit-media-controls {
        display: none;
      }
    </style>
  </head>

  <body>
    <!-- main wrapper  -->
    <div class="fixed z-50 mx-auto w-full bg-white shadow-lg">
      <!-- container  -->
      <nav
        class="mx-auto flex h-[80px] max-w-[1200px] items-center justify-between px-8"
      >
        <!-- logo -->
        <div class="flex justify-center">
          <div class="bg-white">
            <img src="./assets/curriculum-vitae.png" alt="logo" width="27px" />
          </div>
          <span class="mr-1 text-xl font-semibold">Resume</span>
          <span class="text-xl font-semibold text-[#1A91F0]">builder.</span>
        </div>
        <!-- nav links  -->
        <ul class="flex gap-6 font-medium uppercase text-[#464b53]">
          <li>
            <a href="#" class="hover:border-b-2 hover:border-black"><?php echo $lang['home'] ?></a>
          </li>
          <li>
            <a href="profile" class="hover:border-b-2 hover:border-black"
              ><?php echo $lang['Profile'] ?></a
            >
          </li>
          <li>
            <a
              href="search-for-job.php"
              class="hover:border-b-2 hover:border-black"
              ><?php echo $lang['looking-for-job'] ?></a
            >
          </li>
          <li>
            <a href="#" class="hover:border-b-2 hover:border-black">FAQs</a>
          </li>
          <!-- <li><a href="#"><?php echo $lang['about_us'] ?></a></li> -->
        </ul>

        <!-- button  -->
        <div>
          <a
            href="login.php"
            class="bg-white-btn mr-2"
            id="login_btn"
            ><?php echo $lang['Login'] ?></a
          >
          <a
            href="register.php"
            class="bg-blue-btn"
            id="register_btn"
            ><?php echo $lang['register'] ?></a
          >
        </div>
      </nav>
    </div>

    <!-- main section/hero section  -->
    <main class="mb-8 w-full bg-[#f4f4f4] pt-20">
      <!-- left section  -->
      <div class="mx-auto grid h-screen max-w-[1200px] grid-cols-2 px-10">
        <section class="h-screen">
          <div class="flex h-full w-[75%] flex-col items-start justify-center">
            <h1 class="mb-6 text-5xl font-bold text-[#1e2532]">
              <?php echo $lang['the_ultimate'] ?><br />
              <?php echo $lang['resume_builder'] ?>
            </h1>
            <p class="mb-6 text-lg">
              <?php echo $lang['about_one'] ?>
            </p>
            <a href="login.php" class="bg-blue-btn"
              ><?php echo $lang['create_my_resume'] ?></a
            >
          </div>
        </section>
        <!-- right section  -->
        <section class="flex gap-8 overflow-hidden">
          <!-- first line -->
          <div class="flex flex-col gap-8 pt-12" id="nested-div">
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/370/persistent-resource/stockholm-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/389/persistent-resource/new-york-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/383/persistent-resource/santiago-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/370/persistent-resource/stockholm-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/389/persistent-resource/new-york-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/383/persistent-resource/santiago-resume-templates.jpg"
                alt=""
              />
            </span>
          </div>

          <!-- second line -->
          <div class="flex flex-col gap-8" id="nested-div">
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/441/persistent-resource/sydney-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/488/persistent-resource/dublin-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/406/persistent-resource/vienna-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/441/persistent-resource/sydney-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/488/persistent-resource/dublin-resume-templates.jpg"
                alt=""
              />
            </span>
            <span>
              <img
                src="https://s3.resume.io/cdn-cgi/image/width=384,format=auto/uploads/local_template_image/image/406/persistent-resource/vienna-resume-templates.jpg"
                alt=""
              />
            </span>
          </div>
        </section>
      </div>

      <div class="mt-10 h-screen">
        <div class="mx-auto max-w-[1200px] px-10">
          <!-- heading section  -->
          <section class="mb-16 text-center">
            <h2 class="mb-3 text-4xl font-semibold"><?php echo $lang['segments_we_serve'] ?></h2>
            <p class="text-xl"><?php echo $lang['impact_on_talent_ecosystem'] ?></p>
          </section>

          <!-- cards section  -->
          <section class="grid grid-cols-3 gap-5">
            <article class="flex flex-col items-center p-8" id="cards">
              <img
                height="100"
                width="100"
                src="https://d1dcu9ldna0u98.cloudfront.net/assets/website/home/ic-candidate.svg"
                alt=""
              />
              <h4 class="my-3 text-2xl font-semibold"><?php echo $lang['candidate'] ?></h4>
              <p class="mb-2 text-sm">
                <?php echo $lang['sam_three'] ?>
              </p>
              <a href="#" class="text-sm text-[#1a91fa]"><?php echo $lang['know_more'] ?></a>
            </article>
            <article class="flex flex-col items-center p-8" id="cards">
              <img
                height="100"
                width="100"
                src="https://d1dcu9ldna0u98.cloudfront.net/assets/website/home/ic-corporates.svg"
                alt=""
              />
              <h4 class="my-3 text-2xl font-semibold"><?php echo $lang['corporate'] ?></h4>
              <p class="mb-2 text-sm">
                <?php echo $lang['same_tow'] ?>
              </p>
              <a href="#" class="text-sm text-[#1a91fa]"><?php echo $lang['know_more'] ?></a>
            </article>
            <article class="flex flex-col items-center p-8" id="cards">
              <img
                height="100"
                width="100"
                src="https://d1dcu9ldna0u98.cloudfront.net/assets/website/home/ic-career-center.svg"
                alt=""
              />
              <h4 class="my-3 text-2xl font-semibold"><?php echo $lang['higher_education'] ?></h4>
              <p class="mb-2 text-sm">
                <?php echo $lang['sam_one'] ?>
              </p>
              <a href="#" class="text-sm text-[#1a91fa]"><?php echo $lang['know_more'] ?></a>
            </article>
          </section>
        </div>
      </div>

      <!-- features section  -->

      <div class="w-full bg-[#fff]">
        <div class="mx-auto max-w-[1200px] px-10">
          <!-- heading section  -->
          <section class="mb-12 text-center">
            <h2 class="mb-3 text-4xl font-semibold">
              <?php echo $lang['Our_Success'] ?>
            </h2>
            <p class="text-lg">
              <?php echo $lang['World-class_Platform'] ?>
            </p>
          </section>

          <!-- feature section 1 -->
          <section class="mb-16 flex justify-between">
            <div class="flex flex-col justify-center">
              <h4 class="mb-12 text-2xl font-medium text-[#496BC4]">
                SMART PARSING
              </h4>
              <h3 class="text-4xl font-medium leading-[50px]">
                <?php echo $lang['Instant_benchmarking_guidance'] ?>
              </h3>
              <p class="mt-4 text-sm tracking-wider">
                <?php echo $lang['User_profils_are'] ?>
              </p>
            </div>
            <div class="h-[520px] w-[50%]">
              <video
                class="h-full"
                src="https://d1dcu9ldna0u98.cloudfront.net/assets/website/landing-anims/rp.mp4"
                controls
                autoplay
                loop
                muted
                plays-inline
              ></video>
            </div>
          </section>

          <!-- feature section 2 -->
          <section class="mb-16 flex justify-between">
            <div class="h-[520px] w-[50%]">
              <video
                class="h-full"
                src="https://d1dcu9ldna0u98.cloudfront.net/assets/website/landing-anims/se.mp4"
                controls
                autoplay
                loop
                muted
                plays-inline
              ></video>
            </div>
            <div class="flex flex-col justify-center">
              <h4 class="mb-12 text-2xl font-medium text-[#496BC4]">
                <?php echo $lang['SMART_SKILLS_ENGINE'] ?>
              </h4>
              <h3 class="text-4xl font-medium leading-[50px]">
                <?php echo $lang['Skill_detection_about'] ?>
              </h3>
              <p class="mt-4 text-sm tracking-wider">
                <?php echo $lang['skills_des'] ?>
              </p>
            </div>
          </section>

          <!-- feature section 3   -->
          <section class="mb-16 flex justify-between">
            <div class="flex flex-col justify-center">
              <h4 class="mb-12 text-2xl font-medium text-[#496BC4]">
                <?php echo $lang['JOB_PARSING_AND_CLUSTERING'] ?>
              </h4>
              <h3 class="text-4xl font-medium leading-[50px]">
                <?php echo $lang['Extract_and_jobs'] ?>
              </h3>
              <p class="mt-4 text-sm tracking-wider">
                <?php echo $lang['job_des'] ?>
              </p>
            </div>
            <div class="h-[520px] w-[50%]">
              <video
                class="h-full"
                src="https://d1dcu9ldna0u98.cloudfront.net/assets/website/landing-anims/jd.mp4"
                controls
                autoplay
                loop
                muted
                plays-inline
              ></video>
            </div>
          </section>
        </div>
      </div>

      <!-- footer section  -->
      <!-- <a href="./login_register/login.html">
        <div
          class="fixed bottom-0 left-[40%] mb-6 flex h-11 cursor-pointer items-center justify-center text-center transition-all hover:scale-105"
        >
          <span
            class="flex items-center justify-center rounded-md border border-black bg-white p-2 text-2xl font-semibold tracking-tighter"
            >Create a resume
            <i
              class="fa-solid fa-arrow-right -mb-1 ml-4 rounded-full bg-[#1a1c6a] p-3 text-lg text-white"
            ></i>
          </span>
        </div>
      </a> -->

      <div class="footer_container">
        <footer>
          <div class="background">
            <svg></svg>
          </div>
          <section>
            <ul class="socials">
              <li><a href="https://www.facebook.com/abbasawad26" class="fa-brands fa-facebook-f"></a></li>
              <li><a href="https://twitter.com/abbasawad26" class="fa-brands fa-twitter"></a></li>
              <li><a href="https://sd.linkedin.com/in/abbas-awad-618970214" class="fa-brands fa-linkedin-in"></a></li>
              <li><a href="https://youtube.com/@abbasawad?si=dyfkjbAiUOqsvJMn" class="fa-brands fa-youtube"></a></li>
            </ul>
            <ul class="links">
              <li><a href="#"><?php echo $lang['home'] ?></a></li>
              <li><a href="profile"><?php echo $lang['Profile'] ?></a></li>
              <li>
                <a href="search-for-job.php"><?php echo $lang['looking-for-job'] ?></a>
              </li>
              <li><a href="#">FAQs</a></li>
              <li><a href="#"><?php echo $lang['about_us'] ?></a></li>
              <li><a href="#"><?php echo $lang['Contact-us'] ?></a></li>
            </ul>
            <p class="legal">&copy <?php echo $lang['copyr'] ?></p>
          </section>
        </footer>
      </div>
    </main>
    <script
      src="https://kit.fontawesome.com/fe1650bc18.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
