const searchBtn = document.getElementById("searchBtn");
let displayContainer = document.getElementById("displayContainer");
let count = 1;

import { GoogleGenerativeAI } from "@google/generative-ai";
const API_KEY = "AIzaSyBIEScln1EtBCi61VYNPaogJ8U7Fe-LFEA";

// Access your API key (see "Set up your API key" above)
const genAI = new GoogleGenerativeAI(API_KEY);
let divBotheight;

async function run() {
    // adding style to displayContainer
    displayContainer.style.alignItems = "start";
    //   creating user div and attaching msg
    let divUser = document.createElement("div");
    divUser.style.marginTop = "5px";
    divUser.classList.add("flex", "gap-4");
    divUser.innerHTML = `
    <div class=" flex justify-center items-center text-white bg-[rgb(30,31,32)] px-[20px] py-[10px] rounded-lg">Anupam</div>
    `
    displayContainer.append(divUser);
    divBotheight = Number(displayContainer.clientHeight) - Number(divUser.clientHeight);
    window.scrollTo(0, divBotheight);

    // For text-only input, use the gemini-pro model
    const model = genAI.getGenerativeModel({ model: "gemini-pro" });

    const prompt = "Explain and tell me which company hiring for these roles frontend , backend and full stack";
    const result = await model.generateContent(prompt);
    const response = await result.response;
    const text = response.text();
    console.log(text);
    //   creating Bot div and attaching bot answer
    const md = window.markdownit(); // Create a new instance of markdown-it

    let divBot = document.createElement("div");
    divBot.style.display = "flex";
    divBot.style.justifyContent = "center";
    divBot.style.marginTop = "5px";
    divBot.style.marginBottom = "15px";
    divBot.classList.add("flex", "gap-4");
    divBot.innerHTML = `
    <div class=" text-white bg-[rgb(30,31,32)] px-[20px] py-[10px] rounded-lg w-[1200px] text-start">${md.render(text)}</div>
    `
    displayContainer.append(divBot);
    divBotheight = Number(displayContainer.clientHeight) - Number(divBot.clientHeight);
    window.scrollTo(0, divBotheight);
}
searchBtn.addEventListener("click", (e) => {
    console.log("search clicked");
    e.preventDefault();
    if (count === 1) {
        displayContainer.innerText = "";
        count++;
    }
    run();
})