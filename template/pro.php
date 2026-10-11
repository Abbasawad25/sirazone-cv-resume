<?php
 include('../app/config.php'); 
 if(!isset($_SESSION['username'])) {
header('Location: ../login.php');
}  else{
    $uname=$_SESSION['username'];
    $desired_dir="files/$uname/";
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Resume Builder — Vanilla JS</title>
  <link rel="stylesheet" href="..//assets/pro.css" />
</head>
<body>
  <header>
    <h1>Resume Builder (Vanilla JavaScript)</h1>
    <p>Fill the form on the left. Live preview on the right. Add multiple entries for each section.</p>
  </header>

  <main class="container">
    <section class="form-section" aria-labelledby="form-heading">
      <h2 id="form-heading" class="sr-only">Resume Form</h2>
      <form id="resume-form" autocomplete="off">
        <fieldset>
          <legend>About / Personal</legend>

          <div class="two-col">
            <label>
              First name
              <input type="text" id="firstName" placeholder="First name" />
            </label>
            <label>
              Middle name
              <input type="text" id="middleName" placeholder="Middle name" />
            </label>
          </div>

          <div class="two-col">
            <label>
              Last name
              <input type="text" id="lastName" placeholder="Last name" />
            </label>
            <label>
              Profile image
              <input type="file" id="photo" accept="image/*" />
            </label>
          </div>

          <div class="photo-preview" id="photo-preview" aria-hidden="true">
            <img id="photo-img" alt="Profile preview" />
            <div id="photo-filename" class="muted"></div>
          </div>

          <label>
            Short description (occupation/title)
            <input type="text" id="description" placeholder="Full Stack Developer, Data Scientist..." />
          </label>

          <label>
            Address
            <input type="text" id="address" placeholder="Street address" />
          </label>

          <div class="two-col">
            <label>
              City
              <input type="text" id="city" placeholder="City" />
            </label>
            <label>
              Email
              <input type="email" id="email" placeholder="you@example.com" />
            </label>
          </div>

          <div class="two-col">
            <label>
              Phone number
              <input type="tel" id="phone" placeholder="+1 555 555 5555" />
            </label>
            <label>
              Summary
              <input type="text" id="summary" placeholder="Brief professional summary" />
            </label>
          </div>
        </fieldset>

        <fieldset id="achievements-fieldset">
          <legend>Achievements</legend>
          <div id="achievements-list" class="multi-list"></div>
          <button type="button" class="add-btn" data-target="achievements">+ Add Achievement</button>
        </fieldset>

        <fieldset id="experience-fieldset">
          <legend>Experience</legend>
          <div id="experience-list" class="multi-list"></div>
          <button type="button" class="add-btn" data-target="experience">+ Add Experience</button>
        </fieldset>

        <fieldset id="education-fieldset">
          <legend>Education</legend>
          <div id="education-list" class="multi-list"></div>
          <button type="button" class="add-btn" data-target="education">+ Add Education</button>
        </fieldset>

        <fieldset id="projects-fieldset">
          <legend>Projects</legend>
          <div id="projects-list" class="multi-list"></div>
          <button type="button" class="add-btn" data-target="projects">+ Add Project</button>
        </fieldset>

        <fieldset id="skills-fieldset">
          <legend>Skills</legend>
          <div id="skills-list" class="multi-list"></div>
          <button type="button" class="add-btn" data-target="skills">+ Add Skill</button>
        </fieldset>

        <div class="controls">
          <button type="button" id="generate-btn">Generate Preview</button>
          <button type="button" id="download-json-btn">Download JSON</button>
          <button type="button" id="print-btn">Print / Save as PDF</button>
          <button type="button" id="reset-btn" class="danger">Reset</button>
        </div>
      </form>
    </section>

    <section class="preview-section" id="preview" aria-labelledby="preview-heading">
      <h2 id="preview-heading" class="sr-only">Resume Preview</h2>
      <div id="resume-preview" class="resume-card">
        <header class="resume-header">
          <div class="left">
            <img id="pv-photo" alt="Profile" class="pv-photo" />
          </div>
          <div class="center">
            <h2 id="pv-name">Your Name</h2>
            <div id="pv-description" class="muted">Title / Description</div>
            <div id="pv-summary" class="muted small"></div>
          </div>
          <div class="right muted small" id="pv-contact">
            <div id="pv-address"></div>
            <div id="pv-city"></div>
            <div id="pv-email"></div>
            <div id="pv-phone"></div>
          </div>
        </header>

        <section class="pv-section">
          <h3>About</h3>
          <p id="pv-about">Write a short summary about yourself.</p>
        </section>

        <section class="pv-section">
          <h3>Achievements</h3>
          <ul id="pv-achievements"></ul>
        </section>

        <section class="pv-section">
          <h3>Experience</h3>
          <div id="pv-experience"></div>
        </section>

        <section class="pv-section">
          <h3>Education</h3>
          <div id="pv-education"></div>
        </section>

        <section class="pv-section">
          <h3>Projects</h3>
          <div id="pv-projects"></div>
        </section>

        <section class="pv-section">
          <h3>Skills</h3>
          <div id="pv-skills" class="skills-badges"></div>
        </section>
      </div>
    </section>
  </main>

  <script src="../assets/pro.js"></script>
</body>
</html>