<?php
require_once("app/config.php");
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
    <title><?php echo $lang['looking-for-job'] ?></title>
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
    <link rel="icon" type="image/x-icon" href="job-search.png" />
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-gray-100">
    <div
      class="flex h-56 items-center justify-center bg-cover bg-center"
      style="
        background-image: url(&quot;https://img.freepik.com/free-vector/job-recruit-doodle-concept-with-applicant-resume_107791-11271.jpg?w=1480&t=st=1682076327~exp=1682076927~hmac=0a11101fa44a3c3dc4f188eb860e9678836c434ebf974c4c00859508470bcfdf&quot;);
      "
    >
      <div class="flex items-center justify-center">
        <input
          type="text"
          class="w-96 rounded-l-sm border border-gray-300 px-2 py-2 focus:outline-none"
          id="searchbar"
          placeholder="Search for job"
        />
        <button
          class="rounded-r-sm border border-blue-600 bg-blue-500 px-5 py-2 text-white hover:bg-blue-600 focus:outline-none"
          id="search"
        >
          Search
        </button>
      </div>
    </div>

    <div class="mt-10 flex flex-wrap justify-center"></div>

    <script>
      let button = document.getElementById("search");
      button.addEventListener("click", (event) => {
        event.preventDefault();

        let fname = document.getElementById("searchbar").value;
        console.log(fname);

        const options = {
          method: "GET",
          headers: {
            "X-RapidAPI-Key":
              "766dbec67amsh2a31bf858462f20p159feajsn0716998ca0ae",
            "X-RapidAPI-Host": "jsearch.p.rapidapi.com",
          },
        };

        let url = `https://jsearch.p.rapidapi.com/search?query=${fname}`;
        let x;
        fetch(url, options)
          .then((response) => response.json())
          .then((response) => {
            console.log(response);

            x = response.data;
            console.log(x);

            const wholeContainer = document.querySelector(".flex-wrap");
            wholeContainer.innerHTML = "";

            for (let i = 0; i < 10; i++) {
              const firstFiveLines = x[i]["job_description"]
                .split("\n")
                .slice(0, 3)
                .join("\n");
              console.log(firstFiveLines);

              let cookiediv;

              cookiediv = document.createElement("div");
              cookiediv.setAttribute(
                "class",
                "max-w-lg bg-white rounded-lg overflow-hidden shadow-lg mx-4 my-4",
              );
              cookiediv.innerHTML = `
              <div class="px-6 py-4">
                <div class="flex items-center justify-between mb-4">
                  <span class="font-semibold text-xl">Search Result ${i + 1}</span>
                  <img src="${x[i]["employer_logo"]}" alt="Company Logo" class="w-20 h-20 rounded-full">
                </div>
                <p class="text-gray-700"><b><?php echo $lang["job_title"] ?> :</b> ${x[i]["job_title"]}</p>
                <p class="text-gray-700"><b><?php echo $lang["job_state"]; ?> :</b> ${x[i]["job_state"]}</p>
                <p class="text-gray-700"><b><?php echo $lang["job_publisher"]; ?> :</b> ${x[i]["job_publisher"]}</p>
                <p class="text-gray-700"><b><?php echo $lang["job_description"] ?> :</b> ${firstFiveLines}</p>
                <p class="text-gray-700"><b><?php echo $lang["job_employment_type"] ?> :</b> ${x[i]["job_employment_type"]}</p>
                <p class="text-gray-700"><b><?php echo $lang["job_country"] ?> :</b> ${x[i]["job_country"]}</p>
                <p class="text-gray-700"><b><?php echo $lang["job_city"] ?> :</b> ${x[i]["job_city"]}</p>
                <p class="text-gray-700"><b><?php echo $lang["company_type"] ?> :</b> ${x[i]["employer_company_type"]}</p>
              </div>
              <div class="px-6 py-4 flex justify-between items-center">
                <a href="${x[i]["job_apply_link"]}" target="_blank" class="text-blue-500 hover:text-blue-700"><?php echo $lang['apply_link_for_this_job'] ?></a>
                <button class="bg-blue-500 text-white px-4 py-2 rounded focus:outline-none hover:bg-blue-600"><?php echo $lang['apply_now'] ?></button>
              </div>
            `;

              wholeContainer.appendChild(cookiediv);
            }
          })
          .catch((err) => console.error(err));
      });
    </script>
  </body>
</html>
