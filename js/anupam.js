
let i = 1;
const firstNameInput = document.getElementById("firstname");
const middleNameInput = document.getElementById("middlename");
const lastNameInput = document.getElementById("lastname");
const imageInput = document.getElementById("image");
const designationInput = document.getElementById("designation");
const addressInput = document.getElementById("address");
const emailInput = document.getElementById("email");
const phoneInput = document.getElementById("phoneno");
const summaryInput = document.getElementById("summary");



const achievementTitleInput = document.getElementById("achieve_title");
const achievementDescriptionInput = document.getElementById("achieve_description");

const experienceTitleInput = document.getElementById("exp_title");
const organizationInput = document.getElementById("exp_organization");
const locationInput = document.getElementById("exp_location");
const startDateInput = document.getElementById("exp_start_date");
const endDateInput = document.getElementById("exp_end_date");
const experienceDescriptionInput = document.getElementById("exp_description");

const projectNameInput = document.getElementById("proj_title");
const projectLinkInput = document.getElementById("proj_link");
const projectDescriptionInput = document.getElementById("proj_description");


const schoolNameInput = document.getElementById("edu_school");
const degreeInput = document.getElementById("edu_degree");
const schoolLocationInput = document.getElementById("edu_city");
const schoolStartDateInput = document.getElementById("edu_start_date");
const schoolEndDateInput = document.getElementById("edu_graduation_date");
const schoolDescriptionInput = document.getElementById("edu_description");

schoolNameInput.addEventListener("input", updateEducaText);
degreeInput.addEventListener("input", updateEducaText);
schoolLocationInput.addEventListener("input", updateEducaText);
schoolStartDateInput.addEventListener("input", updateEducaText);
schoolEndDateInput.addEventListener("input", updateEducaText);
schoolDescriptionInput.addEventListener("input", updateEducaText);

// Listen for input events on the left container
firstNameInput.addEventListener("input", updateNameText);
middleNameInput.addEventListener("input", updateNameText);
lastNameInput.addEventListener("input", updateNameText);
designationInput.addEventListener("input", updateNameText);
addressInput.addEventListener("input", updateAboutText);
emailInput.addEventListener("input", updateAboutText);
phoneInput.addEventListener("input", updateAboutText);
summaryInput.addEventListener("input", updateAboutText);

achievementTitleInput.addEventListener("input", updateAchieText);
achievementDescriptionInput.addEventListener("input", updateAchieText);

experienceTitleInput.addEventListener("input", updateExperiText);
organizationInput.addEventListener("input", updateExperiText);
locationInput.addEventListener("input", updateExperiText);
startDateInput.addEventListener("input", updateExperiText);
endDateInput.addEventListener("input", updateExperiText);
experienceDescriptionInput.addEventListener("input", updateExperiText);

projectNameInput.addEventListener("input", updateProjectText);
projectLinkInput.addEventListener("input", updateProjectText);
projectDescriptionInput.addEventListener("input", updateProjectText);

imageInput.addEventListener("change", updateRightImage);

const nameText = document.getElementById("fullname_dsp");
const imgText = document.getElementById("image_dsp");
const aboutText = document.getElementById("about_dsp");
const AchieText = document.getElementById("achievements_dsp");
const EducaText = document.getElementById("educations_dsp");
const ExperiText = document.getElementById("experiences_dsp");
const ProjectText = document.getElementById("projects_dsp");

function updateNameText() {
    nameText.innerHTML = `
    <h1 class="text-2xl font-bold mb-2">
    ${firstNameInput.value} ${middleNameInput.value} ${lastNameInput.value}
    </h1>
    <h2 class="text-xl text-center my-2">${designationInput.value}</h2>
    `;
}

function updateAboutText() {
    aboutText.innerHTML = `
     ${phoneInput.value} <br> ${emailInput.value} <br> ${addressInput.value}<br> ${summaryInput.value}<br>
  `;
}

function updateAchieText() {
    AchieText.innerHTML = `
     <b>${achievementTitleInput.value}</b> <br> ${achievementDescriptionInput.value} <br> 
  `;
}

function updateEducaText() {
    EducaText.innerHTML = `
  <h1 class="text-2xl font-bold py-2">${schoolNameInput.value}</h1>
  <h2 class="text-xl mr-2">${degreeInput.value} ${schoolLocationInput.value}<span class="text-sm ml-5 text-white bg-green-800 px-1 py-1 rounded"> ${schoolStartDateInput.value} </span>  <span class="text-sm ml-5 text-white bg-green-800 px-1 py-1 rounded">${schoolEndDateInput.value}</span></h2>
  `;
}

function updateExperiText() {
    ExperiText.innerHTML = `
  <h1 class="text-2xl font-bold py-2">${experienceTitleInput.value}</h1>
  <h2 class="text-xl mr-2">${organizationInput.value} ${locationInput.value}<span class="text-sm ml-5 text-white bg-green-800 px-1 py-1 rounded"> ${startDateInput.value} </span>  <span class="text-sm ml-5 text-white bg-green-800 px-1 py-1 rounded">${endDateInput.value}</span></h2>
  `;
}

function updateProjectText() {
    ProjectText.innerHTML = `
  <h1>${projectNameInput.value}</h1>
  <h2>${projectLinkInput.value} </h2>
  <h2>${projectDescriptionInput.value}</h2>
  `;
}

const skillText = document.getElementById("skillText");
const skill = document.getElementById("skill");
skill.addEventListener("input", updateSkillText);

function updateSkillText(i, value) {
    const skill2 = document.getElementsByClassName(`${i}`);
    skill2.innerText = value;
}

function addMoreSkills() {
    const skillContainer = document.getElementById("skillsContainer");
    const skill = document.createElement("div");
    skill.className =
        "skillDiv w-full mb-3 border border-gray-300 flex flex-col gap-10 p-5";
    skill.innerHTML = `
  <div class="flex relative">
    <div class="flex flex-col ">
      <label class="text-black font-bold mb-2">Skill</label>
      <button class="close" id="closeBtn" onclick="removeSkill()" aria-hidden="true">X</button>

      <input id="${i}" type="text"
        class=" p-2 border border-gray-300 rounded mt-2 w-78 sm:w-96 lg:w-80">
    </div>`;
    skillContainer.appendChild(skill);

    const skill2 = document.createElement("h2");
    skill2.classList.add(`${i}`);
    skillText.append(skill2);
    document.getElementById(`${i}`).addEventListener("input", function (e) {
        console.log("btn clicked");
        updateSkillText(i, e.target.value);
    });

    i++;
}

function updateRightImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            let img = document.createElement("img");
            img.className = "rounded-full w-40 h-40";
            img.src = e.target.result;
            image_dsp.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
}
// download pdf
function downloadCV() {
    var element = document.getElementById("rightContent");
    var opt = {
        margin: 1,
        filename: "myfile.pdf",
        image: { type: "jpeg", quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
    };

    // New Promise-based usage:
    html2pdf().set(opt).from(element).save();

    // Old monolithic-style usage:
    html2pdf(element, opt);
}

document.getElementById("printBtn").addEventListener("click", function () {
    var contentToPrint = document.getElementById("rightContent").innerHTML;
    var originalBodyContent = document.body.innerHTML;
    document.body.innerHTML = contentToPrint;
    window.print();
    document.body.innerHTML = originalBodyContent;
});

// const skills = []

function removeSkill() {
    const skills = document.querySelectorAll(".skillDiv");

    skills.forEach((skill) => {
        skill.style.display = "none";
    });
}

function addMoreProjects() {
    const skillContainer = document.getElementById("ProjectContainer");
    const project = document.createElement("div");
    project.className =
        "projectDiv w-full mb-3 border border-gray-300 flex flex-col gap-10 p-5 mt-5";
    project.innerHTML = `
  <div class="flex flex-col gap-10 lg:flex-row relative">
  <button class="close" id="closeBtn" onclick="removeProject()" aria-hidden="true">X</button>

  <div class="flex flex-col">
      <label class="text-black font-bold">Project Name</label>
      <input id="projectNameInput" type="text"
          class="p-2 border border-gray-300 rounded mt-2 w-78 sm:w-96 lg:w-64">
  </div>

  <div class="flex flex-col">
      <label class="text-black font-bold">Project link</label>
      <input id="projectLinkInput" type="text"
          class="p-2 border border-gray-300 rounded mt-2 w-78 sm:w-96 lg:w-64">
  </div>

  <div class="flex flex-col">
      <label class="text-black font-bold">Description</label>
      <input id="projectDescriptionInput" type="text"
          class="p-2 mt-2 border border-gray-300 rounded  w-78 sm:w-96 lg:w-64">
  </div>
</div>
  `;
    ProjectContainer.appendChild(project);
}

function removeProject() {
    const projects = document.querySelectorAll(".projectDiv");

    projects.forEach((project) => {
        project.style.display = "none";
    });
}

function addMoreEducation() {
    const EducationContainer = document.getElementById("educationDiv");
    const education = document.createElement("div");
    education.className = "newEducation";

    education.innerHTML = `
    <div class="border border-[#0000001a]" id="repeater-div">
    <div>
      <div class="grid grid-cols-3 gap-4 px-4 py-7">
        <div>
          <label class="font-semibold" for="edu_school"
            >School</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="edu_school"
            type="text"
            id="edu_school"
            class="edu_school"
            placeholder="e.g. University Name"
          />
        </div>
        <div>
          <label class="font-semibold" for="edu_degree"
            >Degree</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="edu_degree"
            type="text"
            id="edu_degree"
            class="edu_degree"
            placeholder="e.g. Bachelor of Science"
          />
        </div>
        <div>
          <label class="font-semibold" for="edu_city">City</label>
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="edu_city"
            type="text"
            id="edu_city"
            class="edu_city"
            placeholder="e.g. City"
          />
        </div>
      </div>

      <div class="grid grid-cols-3 gap-4 p-4">
        <div>
          <label class="font-semibold" for="edu_start_date"
            >Start Date</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="edu_start_date"
            type="date"
            id="edu_start_date"
            class="edu_start_date"
          />
        </div>
        <div>
          <label class="font-semibold" for="edu_graduation_date"
            >End Date</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="edu_graduation_date"
            type="date"
            id="edu_graduation_date"
            class="edu_graduation_date"
          />
        </div>
        <div>
          <label class="font-semibold" for="edu_description"
            >Description</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="edu_description"
            type="text"
            id="edu_description"
            class="edu_description"
            placeholder="e.g. Description"
          />
        </div>
      </div>
      <button data-repeater-delete type="button"  onclick="removeEducation()">
        -
      </button>
    </div>
  </div>
    `;

    EducationContainer.appendChild(education);
}

function removeEducation() {
    const educations = document.querySelectorAll(".newEducation");

    educations.forEach((education) => {
        education.addEventListener("click", (e) => {
            e.target.parentNode.parentNode.style.display = "none"
        })

    });
}

function addMoreExperience() {
    const experienceContainer = document.getElementById("experienceDiv");
    const experience = document.createElement("div");
    experience.className = "newExperience";

    experience.innerHTML = `
    <div class="border border-[#0000001a]" id="repeater-div">
    <div>
      <div class="grid grid-cols-3 gap-4 px-4 py-7">
        <div>
          <label class="font-semibold" for="exp_title">Title</label>
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="exp_title"
            type="text"
            id="exp_title"
            class="exp_title"
            placeholder="e.g. Job Title"
          />
        </div>
        <div>
          <label for="exfont-semibold p_organization"
            >Company / Organization</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="exp_organization"
            type="text"
            id="exp_organization"
            class="exp_organization"
            placeholder="e.g. Company Name"
          />
        </div>
        <div>
          <label class="font-semibold" for="exp_location"
            >Location</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="exp_location"
            type="text"
            id="exp_location"
            class="exp_location"
            placeholder="e.g. City, Country"
          />
        </div>
      </div>

      <div class="grid grid-cols-3 gap-4 p-4">
        <div>
          <label class="font-semibold" for="exp_start_date"
            >Start Date</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="exp_start_date"
            type="date"
            id="exp_start_date"
            class="exp_start_date"
          />
        </div>
        <div>
          <label class="font-semibold" for="exp_end_date"
            >End Date</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="exp_end_date"
            type="date"
            id="exp_end_date"
            class="exp_end_date"
          />
        </div>
        <div>
          <label class="font-semibold" for="exp_description"
            >Description</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="exp_description"
            type="text"
            id="exp_description"
            class="exp_description"
            placeholder="e.g. Job Description"
          />
        </div>
      </div>
      <button data-repeater-delete type="button" onclick="removeExperience()">
        -
      </button>
    </div>
  </div>
      `;

    experienceContainer.appendChild(experience);
}

function removeExperience() {
    const experiences = document.querySelectorAll(".newExperience");

    experiences.forEach((experience) => {
        experience.addEventListener("click", (e) => {
            e.target.parentNode.parentNode.style.display = "none"
        })

    });
}

function addMoreAchievements() {
    const achievementsContainer = document.getElementById("achievementsDiv");
    const achievment = document.createElement("div");
    achievment.className = "newAchievment ";
    achievment.innerHTML = `
    <div class="border border-[#0000001a] my-5" id="repeater-div">
    <div>
      <div class="grid grid-cols-2 gap-4 px-4 py-7">
        <div>
          <label class="font-semibold" for="achieve_title"
            >Title</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="achieve_title"
            type="text"
            id="achieve_title"
            class="achieve_title"
            placeholder="e.g. Achievement Title"
          />
        </div>
        <div>
          <label class="font-semibold" for="achieve_description"
            >Description</label
          >
          <input
            class="mt-2 w-full border border-[#0000001a] px-4 py-2 text-base placeholder-gray-500"
            name="achieve_description"
            type="text"
            id="achieve_description"
            cv-form-row
            class="achieve_description"
            placeholder="e.g. Achievement Description"
          />
        </div>
      </div>
      <button data-repeater-delete type="button"  onclick="removeAchievements()">
        -
      </button>
    </div>
  </div>
  
  `;
    achievementsContainer.appendChild(achievment);
}

function removeAchievements() {
    const achievements = document.querySelectorAll(".newAchievment");

    achievements.forEach((achievement) => {
        achievement.addEventListener("click", (e) => {
            e.target.parentNode.parentNode.style.display = "none"
        })

    });
}
