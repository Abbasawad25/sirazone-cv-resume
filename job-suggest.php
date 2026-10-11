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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $lang['job_search'] ?></title>
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
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="dist/output.css" />
  </head>

  <body class="bg-gray-100">
    <!-- <div class="mt-10 flex items-center justify-center">
      <input
        type="text"
        class="rounded-sm border border-gray-300 px-4 py-2 focus:outline-none"
        id="searchbar"
        placeholder="<?php echo $lang['looking-for-job'] ?>"
      />
      <button
        class="max-w-lg rounded-sm bg-blue-500 px-4 py-2 text-white hover:bg-blue-600 focus:outline-none"
        id="search"
      >
        Search
      </button>
    </div> -->
    <div class="sticky top-0 mx-auto w-[80%] bg-white py-4">
      <h1 class="text-center text-4xl font-bold">
        <?php echo $lang['projects_based_on_your_skills_are_here'] ?>
      </h1>
    </div>

    <div class="mx-20 mt-10 flex flex-wrap justify-center"></div>
    <!-- <a href="#"><?php echo $lang['get_more_results'] ?></a> -->

    <script>
      const userData = JSON.parse(localStorage.getItem("userData"));
      const userSkills = userData.skills;
      // function searchForJob() {
      //   userSkills.forEach((obj) => {
      //     console.log(obj.skill);
      //   });
      // }
      // let button = document.getElementById("search");
      window.addEventListener("load", (event) => {
        event.preventDefault();

        // let fname = document.getElementById("searchbar").value;
        // console.log(fname);

        const options = {
          method: "GET",
          headers: {
            "X-RapidAPI-Key":
              "766dbec67amsh2a31bf858462f20p159feajsn0716998ca0ae",
            "X-RapidAPI-Host": "jsearch.p.rapidapi.com",
          },
        };

        userSkills.forEach((obj) => {
          if (obj.skill == "") {
            alert("Enter some skills");
            return;
          }
          let url = `https://jsearch.p.rapidapi.com/search?query=${obj.skill}`;
          let x;
          fetch(url, options)
            .then((response) => response.json())
            .then((response) => {
              // console.log(response);

              x = response.data;
              // console.log(x);

              const wholeContainer = document.querySelector(".flex-wrap");
              wholeContainer.innerHTML = "";

              for (let i = 0; i < 20; i++) {
                const firstFiveLines = x[i]["job_description"]
                  .split("\n")
                  .slice(0, 3)
                  .join("\n");
                // console.log(firstFiveLines);

                let cookiediv;

                cookiediv = document.createElement("div");
                cookiediv.setAttribute(
                  "class",
                  "bg-white overflow-hidden mx-4 my-4",
                );
                cookiediv.innerHTML = `
            <div class="px-24 py-4 flex justify-between flex-col gap-4">
              <span class="font-semibold text-xl text-center">Search Result ${i + 1}</span>
               <p class="text-gray-700"><b><?php echo $lang['job_title'] ?> :</b> ${x[i]["job_title"]}</p>
                <p class="text-gray-700"><b><?php echo $lang['job_state'] ?> :</b> ${x[i]["job_state"]}</p>
                <p class="text-gray-700"><b><?php echo $lang['job_publisher'] ?> :</b> ${x[i]["job_publisher"]}</p>
                <p class="text-gray-700"><b><?php echo $lang['job_description'] ?> :</b> ${firstFiveLines}</p>
                <p class="text-gray-700"><b><?php echo $lang['job_employment_type'] ?> :</b> ${x[i]["job_employment_type"]}</p>
                <p class="text-gray-700"><b><?php echo $lang['job_country'] ?> :</b> ${x[i]["job_country"]}</p>
                <p class="text-gray-700"><b><?php echo $lang['job_city'] ?> :</b> ${x[i]["job_city"]}</p>
                <p class="text-gray-700"><b><?php echo $lang['company_type'] ?> :</b> ${x[i]["employer_company_type"]}</p>
              <div class="px-6 py-4 flex justify-center items-center">
                <a href="${x[i]["job_apply_link"]}" target="_blank" class="bg-blue-500 text-white px-4 py-2 rounded focus:outline-none hover:bg-blue-600 "><?php echo $lang['apply_now'] ?></a>
              </div>
              </div>

            `;

                wholeContainer.appendChild(cookiediv);
              }
            })
            .catch((err) => console.error(err));
        });
      });
    </script>
  </body>
</html>
