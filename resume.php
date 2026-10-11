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
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo $lang['title_site'] ?></title>
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
    <!-- custom css -->
    <link rel="stylesheet" href="./css/main.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
  </head>
  <body>
    <section id="about-sc">
      <div class="container">
        <nav
          class="sticky top-0 z-50 bg-white py-5 text-center text-5xl font-bold"
        >
          <?php echo $lang['site_name'] ?>
        </nav>
        <div class="about-cnt">
          <form action="" class="cv-form" id="cv-form">
            <div class="cv-form-blk">
              <div class="cv-form-row-title">
                <h3><?php echo $lang['about_section'] ?></h3>
              </div>
              <div class="cv-form-row cv-form-row-about">
                <div class="cols-3">
                  <div class="form-elem">
                    <label for="" class="form-label"><?php echo $lang['first_name'] ?></label>
                    <input
                      name="firstname"
                      type="text"
                      class="form-control firstname"
                      id=""
                      onkeyup="generateCV()"
                      placeholder="e.g. abbas"
                    />
                    <span class="form-text"></span>
                  </div>
                  <div class="form-elem">
                    <label for="" class="form-label"
                      >Middle Name
                      <span class="opt-text">(optional)</span></label
                    >
                    <input
                      name="middlename"
                      type="text"
                      class="form-control middlename"
                      id=""
                      onkeyup="generateCV()"
                      placeholder="e.g. awad"
                    />
                    <span class="form-text"></span>
                  </div>
                  <div class="form-elem">
                    <label for="" class="form-label"><?php echo $lang['last_name'] ?></label>
                    <input
                      name="lastname"
                      type="text"
                      class="form-control lastname"
                      id=""
                      onkeyup="generateCV()"
                      placeholder="e.g. Ahmed Mohammed"
                    />
                    <span class="form-text"></span>
                  </div>
                </div>

                <div class="cols-3">
                  <div class="form-elem">
                    <label for="" class="form-label">Your Image</label>
                    <input
                      name="image"
                      type="file"
                      class="form-control image"
                      id=""
                      accept="image/*"
                      onchange="previewImage()"
                    />
                  </div>
                  <div class="form-elem">
                    <label for="" class="form-label"><?php echo $lang['designation'] ?></label>
                    <input
                      name="designation"
                      type="text"
                      class="form-control designation"
                      id=""
                      onkeyup="generateCV()"
                      placeholder="e.g. Sr.Accountants"
                    />
                    <span class="form-text"></span>
                  </div>
                  <div class="form-elem">
                    <label for="" class="form-label">Address</label>
                    <input
                      name="address"
                      type="text"
                      class="form-control address"
                      id=""
                      onkeyup="generateCV()"
                      placeholder="e.g. sudan Street-23"
                    />
                    <span class="form-text"></span>
                  </div>
                </div>

                <div class="cols-3">
                  <div class="form-elem">
                    <label for="" class="form-label"><?php echo $lang['email'] ?></label>
                    <input
                      name="email"
                      type="text"
                      class="form-control email"
                      id=""
                      onkeyup="generateCV()"
                      placeholder="e.g. simasoft@gmail.com"
                    />
                    <span class="form-text"></span>
                  </div>
                  <div class="form-elem">
                    <label for="" class="form-label"><?php echo $lang['phone_number'] ?></label>
                    <input
                      name="phoneno"
                      type="text"
                      class="form-control phoneno"
                      id=""
                      onkeyup="generateCV()"
                      placeholder="e.g. +24999881457"
                    />
                    <span class="form-text"></span>
                  </div>
                  <div class="form-elem">
                    <label for="" class="form-label"><?php echo $lang['summary'] ?></label>
                    <input
                      name="summary"
                      type="text"
                      class="form-control summary"
                      id=""
                      onkeyup="generateCV()"
                      placeholder="e.g. im"
                    />
                    <span class="form-text"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="cv-form-blk">
              <div class="cv-form-row-title">
                <h3><?php echo $lang['achievements'] ?></h3>
              </div>

              <div class="row-separator repeater">
                <div class="repeater" data-repeater-list="group-a">
                  <div data-repeater-item>
                    <div class="cv-form-row cv-form-row-achievement">
                      <div class="cols-2">
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['title'] ?></label>
                          <input
                            name="achieve_title"
                            type="text"
                            class="form-control achieve_title"
                            id=""
                            onkeyup="generateCV()"
                            placeholder="e.g. abbas@gmail.com"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['description'] ?></label>
                          <input
                            name="achieve_description"
                            type="text"
                            class="form-control achieve_description"
                            id=""
                            onkeyup="generateCV()"
                            placeholder="e.g. abbas@gmail.com"
                          />
                          <span class="form-text"></span>
                        </div>
                      </div>
                      <button
                        data-repeater-delete
                        type="button"
                        class="repeater-remove-btn"
                      >
                        Remove
                      </button>
                    </div>
                  </div>
                </div>
                <button
                  type="button"
                  data-repeater-create
                  value="Add"
                  class="repeater-add-btn"
                >
                  Add
                </button>
              </div>
            </div>

            <div class="cv-form-blk">
              <div class="cv-form-row-title">
                <h3><?php echo $lang['experience'] ?></h3>
              </div>

              <div class="row-separator repeater">
                <div class="repeater" data-repeater-list="group-b">
                  <div data-repeater-item>
                    <div class="cv-form-row cv-form-row-experience">
                      <div class="cols-3">
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['title'] ?></label>
                          <input
                            name="exp_title"
                            type="text"
                            class="form-control exp_title"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"
                            ><?php echo $lang['company'] ?></label
                          >
                          <input
                            name="exp_organization"
                            type="text"
                            class="form-control exp_organization"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['location'] ?></label>
                          <input
                            name="exp_location"
                            type="text"
                            class="form-control exp_location"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                      </div>

                      <div class="cols-3">
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['start_date'] ?></label>
                          <input
                            name="exp_start_date"
                            type="date"
                            class="form-control exp_start_date"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['end_date'] ?></label>
                          <input
                            name="exp_end_date"
                            type="date"
                            class="form-control exp_end_date"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['description'] ?></label>
                          <input
                            name="exp_description"
                            type="text"
                            class="form-control exp_description"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                      </div>

                      <button
                        data-repeater-delete
                        type="button"
                        class="repeater-remove-btn"
                      >
                        Remove
                      </button>
                    </div>
                  </div>
                </div>
                <button
                  type="button"
                  data-repeater-create
                  value="Add"
                  class="repeater-add-btn"
                >
                  Add
                </button>
              </div>
            </div>

            <div class="cv-form-blk">
              <div class="cv-form-row-title">
                <h3><?php echo $lang['name'] ?></h3>
              </div>

              <div class="row-separator repeater">
                <div class="repeater" data-repeater-list="group-c">
                  <div data-repeater-item>
                    <div class="cv-form-row cv-form-row-experience">
                      <div class="cols-3">
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['name_education'] ?></label>
                          <input
                            name="edu_school"
                            type="text"
                            class="form-control edu_school"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['degree'] ?></label>
                          <input
                            name="edu_degree"
                            type="text"
                            class="form-control edu_degree"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['address'] ?></label>
                          <input
                            name="edu_city"
                            type="text"
                            class="form-control edu_city"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                      </div>

                      <div class="cols-3">
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['start_date'] ?></label>
                          <input
                            name="edu_start_date"
                            type="date"
                            class="form-control edu_start_date"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['end_date'] ?></label>
                          <input
                            name="edu_graduation_date"
                            type="date"
                            class="form-control edu_graduation_date"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['description'] ?></label>
                          <input
                            name="edu_description"
                            type="text"
                            class="form-control edu_description"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                      </div>

                      <button
                        data-repeater-delete
                        type="button"
                        class="repeater-remove-btn"
                      >
                        Remove
                      </button>
                    </div>
                  </div>
                </div>
                <button
                  type="button"
                  data-repeater-create
                  value="Add"
                  class="repeater-add-btn"
                >
                  Add
                </button>
              </div>
            </div>

            <div class="cv-form-blk">
              <div class="cv-form-row-title">
                <h3><?php echo $lang['projects'] ?></h3>
              </div>

              <div class="row-separator repeater">
                <div class="repeater" data-repeater-list="group-d">
                  <div data-repeater-item>
                    <div class="cv-form-row cv-form-row-experience">
                      <div class="cols-3">
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['project_name'] ?></label>
                          <input
                            name="proj_title"
                            type="text"
                            class="form-control proj_title"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['project_link'] ?></label>
                          <input
                            name="proj_link"
                            type="text"
                            class="form-control proj_link"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                          <label for="" class="form-label"><?php echo $lang['description'] ?></label>
                          <input
                            name="proj_description"
                            type="text"
                            class="form-control proj_description"
                            id=""
                            onkeyup="generateCV()"
                          />
                          <span class="form-text"></span>
                        </div>
                      </div>
                      <button
                        data-repeater-delete
                        type="button"
                        class="repeater-remove-btn"
                      >
                        Remove
                      </button>
                    </div>
                  </div>
                </div>
                <button
                  type="button"
                  data-repeater-create
                  value="Add"
                  class="repeater-add-btn"
                >
                  Add
                </button>
              </div>
            </div>

            <div class="cv-form-blk">
              <div class="cv-form-row-title">
                <h3><?php echo $lang['skills'] ?></h3>
              </div>

              <div class="row-separator repeater">
                <div class="repeater" data-repeater-list="group-e">
                  <div data-repeater-item>
                    <div class="cv-form-row cv-form-row-skills">
                      <div class="form-elem">
                        <label for="" class="form-label">Skill</label>
                        <input
                          name="skill"
                          type="text"
                          class="form-control skill"
                          id=""
                          onkeyup="generateCV()"
                        />
                        <span class="form-text"></span>
                      </div>

                      <button
                        data-repeater-delete
                        type="button"
                        class="repeater-remove-btn"
                      >
                        Remove
                      </button>
                    </div>
                  </div>
                </div>
                <button
                  type="button"
                  data-repeater-create
                  value="Add"
                  class="repeater-add-btn"
                >
                  Add
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <section id="preview-sc" class="print_area downlaod_margin">
      <div class="container">
        <div class="preview-cnt">
          <div class="preview-cnt-l bg-green text-white">
            <div class="preview-blk">
              <div class="preview-image">
                <img src="" alt="" id="image_dsp" />
              </div>
              <div class="preview-item preview-item-name">
                <span class="preview-item-val fw-6" id="fullname_dsp"></span>
              </div>
              <div class="preview-item">
                <span
                  class="preview-item-val text-uppercase fw-6 ls-1"
                  id="designation_dsp"
                ></span>
              </div>
            </div>

            <div class="preview-blk">
              <div class="preview-blk-title">
                <h3>about</h3>
              </div>
              <div class="preview-blk-list">
                <div class="preview-item">
                  <span class="preview-item-val" id="phoneno_dsp"></span>
                </div>
                <div class="preview-item">
                  <span class="preview-item-val" id="email_dsp"></span>
                </div>
                <div class="preview-item">
                  <span class="preview-item-val" id="address_dsp"></span>
                </div>
                <div class="preview-item">
                  <span class="preview-item-val" id="summary_dsp"></span>
                </div>
              </div>
            </div>

            <div class="preview-blk">
              <div class="preview-blk-title">
                <h3>skills</h3>
              </div>
              <div class="skills-items preview-blk-list" id="skills_dsp">
                <!-- skills list here -->
              </div>
            </div>
          </div>

          <div class="preview-cnt-r bg-white">
            <div class="preview-blk">
              <div class="preview-blk-title">
                <h3>Achievements</h3>
              </div>
              <div
                class="achievements-items preview-blk-list"
                id="achievements_dsp"
              ></div>
            </div>

            <div class="preview-blk">
              <div class="preview-blk-title">
                <h3>educations</h3>
              </div>
              <div
                class="educations-items preview-blk-list"
                id="educations_dsp"
              ></div>
            </div>

            <div class="preview-blk">
              <div class="preview-blk-title">
                <h3>experiences</h3>
              </div>
              <div
                class="experiences-items preview-blk-list"
                id="experiences_dsp"
              ></div>
            </div>

            <div class="preview-blk">
              <div class="preview-blk-title">
                <h3>projects</h3>
              </div>
              <div
                class="projects-items preview-blk-list"
                id="projects_dsp"
              ></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="print-btn-sc" style="text-align: center">
      <div class="container">
        <button type="button" id="printBtn" class="print-btn btn btn-primary">
          <?php echo $lang['print_cv'] ?>
        </button>
        <button
          id="downlaod_cv_btn"
          type="button"
          class="print-btn btn btn-primary"
        >
          <?php echo $lang['download_cv'] ?>
        </button>
        <a
          type="button"
          id="get_jobs_btn"
          href="job-suggest.php"
          class="print-btn btn btn-primary"
          style="cursor: pointer"
        >
          <?php echo $lang['get_jobs_suggestions'] ?>
        </a>
        <a
          href="project_suggestion.php"
          type="button"
          class="print-btn btn btn-primary"
        >
          <?php echo $lang['get_projects_suggestions'] ?>
        </a>
      </div>
    </section>
    <!-- job Suggestions section  -->
    <script type="importmap">
      {
        "imports": {
          "@google/generative-ai": "https://esm.run/@google/generative-ai"
        }
      }
    </script>

    <!-- jquery cdn -->
    <script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"
      integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- custom resume  -->
    <script src="./js/script.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- gemini script -->
    <script src="https://cdn.jsdelivr.net/npm/markdown-it/dist/markdown-it.min.js"></script>
    <!-- <script src="./js/gemini.js" type="module"></script> -->
  </body>
</html>
