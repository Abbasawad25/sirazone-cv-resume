<?php
include('app/config.php'); 
 if(!isset($_SESSION['username'])) {
header('Location: login.php');
}  else{
    $uname=$_SESSION['username'];
    $desired_dir="files/$uname/";
}
?>
<!doctype html>
<html lang="<?php echo $lang['lang'] ?>" dir="<?php echo $lang['dir'] ?>">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $lang['site_title'] ?></title>
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
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />

    <script src="https://cdn.jsdelivr.net/npm/markdown-it/dist/markdown-it.min.js"></script>
  </head>
  <body>
    <div class="banner">
      <div class="context">
        <h1 class="md:2xl mb-4 text-center text-4xl font-bold text-black">
          <?php echo $lang['projects_based_on_your_skills_are_here'] ?>
        </h1>

        <div id="projectRecommendation" class="text-3xl text-white">
          <div class="loading-container text-start">
            <div id="loading-text"><span class="loader"></span></div>
          </div>
        </div>
      </div>
    </div>
    <script type="importmap">
      {
        "imports": {
          "@google/generative-ai": "https://esm.run/@google/generative-ai"
        }
      }
    </script>
    <script type="module">
      import { GoogleGenerativeAI } from "@google/generative-ai";
      const API_KEY = "AIzaSyAYhghPB47muOGdbJ-p26A7AUxRSxQ94cw";
      const md = window.markdownit();
      const genAI = new GoogleGenerativeAI(API_KEY);

      let text;

      const urlParams = new URLSearchParams(window.location.search);

      const skill = urlParams.get("project");

      //   console.log(skill);
      const userData = JSON.parse(localStorage.getItem("userData"));
      let userSkills = userData.skills;
      userSkills.forEach((element) => {
        async function run() {
          let projectRecommendation = document.getElementById(
            "projectRecommendation",
          );

          // For text-only input, use the gemini-pro model
          const model = genAI.getGenerativeModel({ model: "gemini-pro" });

          const prompt =
            "Projects based on " +
            element.skill +
            " are and also give some clickable link for refrences link like after clicking on them we should indirect there: ";

          const result = await model.generateContent(prompt);
          const response = await result.response;
          text = response.text();
          projectRecommendation.innerHTML = "";
          projectRecommendation.innerHTML += md.render(text);

          console.log(text);
        }
        window.addEventListener("load", () => {
          run();
        });
      });
    </script>
  </body>
</html>
