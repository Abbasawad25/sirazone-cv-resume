// regex for validation
const strRegex = /^[a-zA-Z\s]*$/; // containing only letters
const emailRegex =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const phoneRegex =
    /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
/* supports following number formats - (123) 456-7890, (123)456-7890, 123-456-7890, 123.456.7890, 1234567890, +31636363634, 075-63546725 */
const digitRegex = /^\d+$/;

const mainForm = document.getElementById("cv-form");
const validType = {
    TEXT: "text",
    TEXT_EMP: "text_emp",
    EMAIL: "email",
    DIGIT: "digit",
    PHONENO: "phoneno",
    ANY: "any",
};

// user inputs elements
let firstnameElem = mainForm.firstname,
    middlenameElem = mainForm.middlename,
    lastnameElem = mainForm.lastname,
    imageElem = mainForm.image,
    designationElem = mainForm.designation,
    addressElem = mainForm.address,
    emailElem = mainForm.email,
    phonenoElem = mainForm.phoneno,
    summaryElem = mainForm.summary;


// display elements
let nameDsp = document.getElementById("fullname_dsp"),
    imageDsp = document.getElementById("image_dsp"),
    phonenoDsp = document.getElementById("phoneno_dsp"),
    emailDsp = document.getElementById("email_dsp"),
    addressDsp = document.getElementById("address_dsp"),
    designationDsp = document.getElementById("designation_dsp"),
    summaryDsp = document.getElementById("summary_dsp"),
    projectsDsp = document.getElementById("projects_dsp"),
    achievementsDsp = document.getElementById("achievements_dsp"),
    skillsDsp = document.getElementById("skills_dsp"),
    educationsDsp = document.getElementById("educations_dsp"),
    experiencesDsp = document.getElementById("experiences_dsp");

// first value is for the attributes and second one passes the nodelists
const fetchValues = (attrs, ...nodeLists) => {
    let elemsAttrsCount = nodeLists.length;
    let elemsDataCount = nodeLists[0].length;
    let tempDataArr = [];

    // first loop deals with the no of repeaters value
    for (let i = 0; i < elemsDataCount; i++) {
        let dataObj = {}; // creating an empty object to fill the data
        // second loop fetches the data for each repeaters value or attributes
        for (let j = 0; j < elemsAttrsCount; j++) {
            // setting the key name for the object and fill it with data
            dataObj[`${attrs[j]}`] = nodeLists[j][i].value;
        }
        tempDataArr.push(dataObj);
    }

    return tempDataArr;
};

const getUserInputs = () => {
    // achivements
    let achievementsTitleElem = document.querySelectorAll(".achieve_title"),
        achievementsDescriptionElem = document.querySelectorAll(
            ".achieve_description"
        );

    // experiences
    let expTitleElem = document.querySelectorAll(".exp_title"),
        expOrganizationElem = document.querySelectorAll(".exp_organization"),
        expLocationElem = document.querySelectorAll(".exp_location"),
        expStartDateElem = document.querySelectorAll(".exp_start_date"),
        expEndDateElem = document.querySelectorAll(".exp_end_date"),
        expDescriptionElem = document.querySelectorAll(".exp_description");

    // education
    let eduSchoolElem = document.querySelectorAll(".edu_school"),
        eduDegreeElem = document.querySelectorAll(".edu_degree"),
        eduCityElem = document.querySelectorAll(".edu_city"),
        eduStartDateElem = document.querySelectorAll(".edu_start_date"),
        eduGraduationDateElem = document.querySelectorAll(".edu_graduation_date"),
        eduDescriptionElem = document.querySelectorAll(".edu_description");

    let projTitleElem = document.querySelectorAll(".proj_title"),
        projLinkElem = document.querySelectorAll(".proj_link"),
        projDescriptionElem = document.querySelectorAll(".proj_description");

    let skillElem = document.querySelectorAll(".skill");

    return {
        firstname: firstnameElem.value,
        middlename: middlenameElem.value,
        lastname: lastnameElem.value,
        designation: designationElem.value,
        address: addressElem.value,
        email: emailElem.value,
        phoneno: phonenoElem.value,
        summary: summaryElem.value,
        achievements: fetchValues(
            ["achieve_title", "achieve_description"],
            achievementsTitleElem,
            achievementsDescriptionElem
        ),
        experiences: fetchValues(
            [
                "exp_title",
                "exp_organization",
                "exp_location",
                "exp_start_date",
                "exp_end_date",
                "exp_description",
            ],
            expTitleElem,
            expOrganizationElem,
            expLocationElem,
            expStartDateElem,
            expEndDateElem,
            expDescriptionElem
        ),
        educations: fetchValues(
            [
                "edu_school",
                "edu_degree",
                "edu_city",
                "edu_start_date",
                "edu_graduation_date",
                "edu_description",
            ],
            eduSchoolElem,
            eduDegreeElem,
            eduCityElem,
            eduStartDateElem,
            eduGraduationDateElem,
            eduDescriptionElem
        ),
        projects: fetchValues(
            ["proj_title", "proj_link", "proj_description"],
            projTitleElem,
            projLinkElem,
            projDescriptionElem
        ),
        skills: fetchValues(["skill"], skillElem),
    };
};

// adding the invalid text
function addErrMsg(formElem, formElemName) {
    formElem.nextElementSibling.innerHTML = `${formElemName} is invalid`;
}

// removing the invalid text
function removeErrMsg(formElem) {
    formElem.nextElementSibling.innerHTML = "";
}

// show the list data
const showListData = (listData, listContainer) => {
    listContainer.innerHTML = "";
    listData.forEach((listItem) => {
        let itemElem = document.createElement("div");
        itemElem.classList.add("preview-item");

        for (const key in listItem) {
            let subItemElem = document.createElement("span");
            subItemElem.classList.add("preview-item-val");
            subItemElem.innerHTML = `${listItem[key]}`;
            itemElem.appendChild(subItemElem);
        }

        listContainer.appendChild(itemElem);
    });
};

const displayCV = (userData) => {
    nameDsp.innerHTML =
        userData.firstname + " " + userData.middlename + " " + userData.lastname;
    phonenoDsp.innerHTML = userData.phoneno;
    emailDsp.innerHTML = userData.email;
    addressDsp.innerHTML = userData.address;
    designationDsp.innerHTML = userData.designation;
    summaryDsp.innerHTML = userData.summary;
    showListData(userData.projects, projectsDsp);
    showListData(userData.achievements, achievementsDsp);
    showListData(userData.skills, skillsDsp);
    showListData(userData.educations, educationsDsp);
    showListData(userData.experiences, experiencesDsp);
};
// generate CV
const generateCV = () => {
    let userData = getUserInputs();
    localStorage.setItem("userData", JSON.stringify(userData));
    displayCV(userData);
    // console.log(userData);
};
function jobSuggestions(skills) {
    skills.forEach((skill) => {
        // askGemini(skill.skill);
        return skill.skill;
    })
}

function previewImage() {
    let oFReader = new FileReader();
    oFReader.readAsDataURL(imageElem.files[0]);
    oFReader.onload = function (ofEvent) {
        imageDsp.src = ofEvent.target.result;
    };
}

const downloadBtn = document.getElementById("downlaod_cv_btn");
const cvContainer = document.getElementById("preview-sc");
downloadBtn.onclick = (e) => html2pdf(cvContainer);

document.getElementById("printBtn").addEventListener("click", function () {
    var contentToPrint = document.getElementById("preview-sc").innerHTML;
    var originalBodyContent = document.body.innerHTML;
    document.body.innerHTML = contentToPrint;
    window.print();
    document.body.innerHTML = originalBodyContent;
});

const getJobsBtn = document.getElementById("get_jobs_btn");
getJobsBtn.addEventListener("click", function () {
    let anupamdata = getUserInputs();
})