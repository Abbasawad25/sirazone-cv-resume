// Vanilla JS Resume Builder (extended fields)
// Sections: about (first,middle,last,img,description,address,city,email,phone,summary),
// achievements (title,description), experience (title,company,location,start,end,desc),
// education (school,degree,city,start,end,desc), projects (name,link,desc),
// skills (name,degree)

(function () {
  // helper to create elements
  function el(tag, attrs = {}, ...children) {
    const e = document.createElement(tag);
    for (const [k, v] of Object.entries(attrs)) {
      if (k === "class") e.className = v;
      else if (k === "dataset") {
        for (const [dk, dv] of Object.entries(v)) e.dataset[dk] = dv;
      } else if (k === "style") e.setAttribute("style", v);
      else e[k] = v;
    }
    children.flat().forEach(c => {
      if (c == null) return;
      e.append(typeof c === "string" ? document.createTextNode(c) : c);
    });
    return e;
  }

  // DOM targets
  const targets = {
    achievements: document.getElementById("achievements-list"),
    experience: document.getElementById("experience-list"),
    education: document.getElementById("education-list"),
    projects: document.getElementById("projects-list"),
    skills: document.getElementById("skills-list")
  };

  const preview = {
    name: document.getElementById("pv-name"),
    photo: document.getElementById("pv-photo"),
    description: document.getElementById("pv-description"),
    summary: document.getElementById("pv-summary"),
    address: document.getElementById("pv-address"),
    city: document.getElementById("pv-city"),
    email: document.getElementById("pv-email"),
    phone: document.getElementById("pv-phone"),
    about: document.getElementById("pv-about"),
    achievements: document.getElementById("pv-achievements"),
    experience: document.getElementById("pv-experience"),
    education: document.getElementById("pv-education"),
    projects: document.getElementById("pv-projects"),
    skills: document.getElementById("pv-skills"),
    photoFilename: document.getElementById("photo-filename"),
    photoImg: document.getElementById("photo-img")
  };

  // state
  const state = {
    imageDataUrl: "" // populated on file select
  };

  // wire up add buttons
  document.querySelectorAll(".add-btn").forEach(btn => {
    btn.addEventListener("click", () => addListItem(btn.dataset.target));
  });

  // image input handling
  const photoInput = document.getElementById("photo");
  photoInput.addEventListener("change", handlePhotoChange);

  function handlePhotoChange(e) {
    const file = e.target.files && e.target.files[0];
    const previewImg = document.getElementById("photo-img");
    const photoFilename = document.getElementById("photo-filename");

    if (!file) {
      previewImg.src = "";
      previewImg.style.display = "none";
      photoFilename.textContent = "";
      state.imageDataUrl = "";
      return;
    }

    const reader = new FileReader();
    reader.onload = function (ev) {
      state.imageDataUrl = ev.target.result; // data URL
      previewImg.src = state.imageDataUrl;
      previewImg.style.display = "";
      photoFilename.textContent = file.name;
      // update right-side photo
      document.getElementById("pv-photo").src = state.imageDataUrl;
      document.getElementById("pv-photo").style.display = "";
    };
    reader.readAsDataURL(file);
  }

  // initial one item in each list
  ["achievements", "experience", "education", "projects", "skills"].forEach(addListItem);

  // add item factory
  function addListItem(target) {
    const container = targets[target];
    if (!container) return;

    if (target === "achievements") {
      const item = el("div", { class: "multi-item" },
        el("label", {}, "Title",
          el("input", { type: "text", placeholder: "Achievement title", className: "mi-title" })
        ),
        el("label", {}, "Description",
          el("textarea", { rows: 2, placeholder: "Short details", className: "mi-desc" })
        ),
        el("button", { type: "button", className: "remove-btn" }, "Remove")
      );
      item.querySelector(".remove-btn").addEventListener("click", () => item.remove());
      container.appendChild(item);
      return;
    }

    if (target === "experience") {
      const item = el("div", { class: "multi-item" },
        el("div", { className: "row" },
          el("label", {}, "Title",
            el("input", { type: "text", placeholder: "Role / Title", className: "mi-title" })
          ),
          el("label", {}, "Company",
            el("input", { type: "text", placeholder: "Company name", className: "mi-company" })
          )
        ),
        el("div", { className: "row" },
          el("label", {}, "Location",
            el("input", { type: "text", placeholder: "City, Country", className: "mi-location" })
          ),
          el("label", {}, "Dates",
            el("div", {},
              el("input", { type: "text", placeholder: "Start (e.g. Jan 2020)", className: "mi-start" }),
              el("input", { type: "text", placeholder: "End (e.g. Present)", className: "mi-end", style: "margin-top:6px" })
            )
          )
        ),
        el("label", {}, "Description",
          el("textarea", { rows: 3, placeholder: "Responsibilities or achievements", className: "mi-desc" })
        ),
        el("button", { type: "button", className: "remove-btn" }, "Remove")
      );
      item.querySelector(".remove-btn").addEventListener("click", () => item.remove());
      container.appendChild(item);
      return;
    }

    if (target === "education") {
      const item = el("div", { class: "multi-item" },
        el("div", { className: "row" },
          el("label", {}, "School",
            el("input", { type: "text", placeholder: "School or University", className: "mi-school" })
          ),
          el("label", {}, "Degree",
            el("input", { type: "text", placeholder: "Degree (e.g. B.Sc. Computer Science)", className: "mi-degree" })
          )
        ),
        el("div", { className: "row" },
          el("label", {}, "City",
            el("input", { type: "text", placeholder: "City", className: "mi-city" })
          ),
          el("label", {}, "Dates",
            el("div", {},
              el("input", { type: "text", placeholder: "Start (e.g. 2016)", className: "mi-start" }),
              el("input", { type: "text", placeholder: "End (e.g. 2020)", className: "mi-end", style: "margin-top:6px" })
            )
          )
        ),
        el("label", {}, "Description",
          el("textarea", { rows: 2, placeholder: "Thesis, honors or coursework", className: "mi-desc" })
        ),
        el("button", { type: "button", className: "remove-btn" }, "Remove")
      );
      item.querySelector(".remove-btn").addEventListener("click", () => item.remove());
      container.appendChild(item);
      return;
    }

    if (target === "projects") {
      const item = el("div", { class: "multi-item" },
        el("label", {}, "Project name",
          el("input", { type: "text", placeholder: "Project title", className: "mi-title" })
        ),
        el("label", {}, "Project link",
          el("input", { type: "text", placeholder: "https://...", className: "mi-link" })
        ),
        el("label", {}, "Description",
          el("textarea", { rows: 2, placeholder: "Short summary of the project", className: "mi-desc" })
        ),
        el("button", { type: "button", className: "remove-btn" }, "Remove")
      );
      item.querySelector(".remove-btn").addEventListener("click", () => item.remove());
      container.appendChild(item);
      return;
    }

    if (target === "skills") {
      const item = el("div", { class: "multi-item" },
        el("div", { className: "row" },
          el("label", {}, "Skill name",
            el("input", { type: "text", placeholder: "JavaScript, Python...", className: "mi-name" })
          ),
          el("label", {}, "Degree / Level",
            el("input", { type: "text", placeholder: "Expert / Intermediate / Beginner", className: "mi-level" })
          )
        ),
        el("button", { type: "button", className: "remove-btn" }, "Remove")
      );
      item.querySelector(".remove-btn").addEventListener("click", () => item.remove());
      container.appendChild(item);
      return;
    }
  }

  // wire up controls
  document.getElementById("generate-btn").addEventListener("click", generatePreview);
  document.getElementById("print-btn").addEventListener("click", () => window.print());
  document.getElementById("download-json-btn").addEventListener("click", downloadJSON);
  document.getElementById("reset-btn").addEventListener("click", resetForm);

  // collect state from form DOM
  function collectState() {
    const out = {};

    out.firstName = document.getElementById("firstName").value.trim();
    out.middleName = document.getElementById("middleName").value.trim();
    out.lastName = document.getElementById("lastName").value.trim();
    out.fullName = [out.firstName, out.middleName, out.lastName].filter(Boolean).join(" ");
    out.description = document.getElementById("description").value.trim();
    out.address = document.getElementById("address").value.trim();
    out.city = document.getElementById("city").value.trim();
    out.email = document.getElementById("email").value.trim();
    out.phone = document.getElementById("phone").value.trim();
    out.summary = document.getElementById("summary").value.trim();
    out.image = state.imageDataUrl || "";

    // achievements
    out.achievements = Array.from(targets.achievements.querySelectorAll(".multi-item")).map(item => ({
      title: item.querySelector(".mi-title")?.value.trim() || "",
      description: item.querySelector(".mi-desc")?.value.trim() || ""
    })).filter(a => a.title || a.description);

    // experience
    out.experience = Array.from(targets.experience.querySelectorAll(".multi-item")).map(item => ({
      title: item.querySelector(".mi-title")?.value.trim() || "",
      company: item.querySelector(".mi-company")?.value.trim() || "",
      location: item.querySelector(".mi-location")?.value.trim() || "",
      startDate: item.querySelector(".mi-start")?.value.trim() || "",
      endDate: item.querySelector(".mi-end")?.value.trim() || "",
      description: item.querySelector(".mi-desc")?.value.trim() || ""
    })).filter(e => e.title || e.company || e.description);

    // education
    out.education = Array.from(targets.education.querySelectorAll(".multi-item")).map(item => ({
      school: item.querySelector(".mi-school")?.value.trim() || "",
      degree: item.querySelector(".mi-degree")?.value.trim() || "",
      city: item.querySelector(".mi-city")?.value.trim() || "",
      startDate: item.querySelector(".mi-start")?.value.trim() || "",
      endDate: item.querySelector(".mi-end")?.value.trim() || "",
      description: item.querySelector(".mi-desc")?.value.trim() || ""
    })).filter(e => e.school || e.degree);

    // projects
    out.projects = Array.from(targets.projects.querySelectorAll(".multi-item")).map(item => ({
      name: item.querySelector(".mi-title")?.value.trim() || "",
      link: item.querySelector(".mi-link")?.value.trim() || "",
      description: item.querySelector(".mi-desc")?.value.trim() || ""
    })).filter(p => p.name || p.description);

    // skills
    out.skills = Array.from(targets.skills.querySelectorAll(".multi-item")).map(item => ({
      name: item.querySelector(".mi-name")?.value.trim() || "",
      degree: item.querySelector(".mi-level")?.value.trim() || ""
    })).filter(s => s.name);

    return out;
  }

  // render preview
  function generatePreview() {
    const data = collectState();

    preview.name.textContent = data.fullName || "Your Name";
    preview.description.textContent = data.description || "";
    preview.summary.textContent = data.summary || "";
    preview.address.textContent = data.address || "";
    preview.city.textContent = data.city || "";
    preview.email.textContent = data.email ? `Email: ${data.email}` : "";
    preview.phone.textContent = data.phone ? `Phone: ${data.phone}` : "";
    preview.about.textContent = data.summary || "Write a short professional summary.";

    // photo on right card
    if (data.image) {
      preview.photo.src = data.image;
      preview.photo.style.display = "";
    } else {
      preview.photo.src = "";
      preview.photo.style.display = "none";
    }

    // achievements
    preview.achievements.innerHTML = "";
    if (data.achievements.length === 0) {
      preview.achievements.innerHTML = "<li class='muted'>No achievements added</li>";
    } else {
      data.achievements.forEach(a => {
        const li = document.createElement("li");
        const title = document.createElement("strong");
        title.textContent = a.title || "";
        li.appendChild(title);
        if (a.description) {
          const p = document.createElement("div");
          p.className = "muted";
          p.textContent = a.description;
          li.appendChild(p);
        }
        preview.achievements.appendChild(li);
      });
    }

    // experience
    preview.experience.innerHTML = "";
    if (data.experience.length === 0) {
      preview.experience.innerHTML = "<div class='muted'>No experience added</div>";
    } else {
      data.experience.forEach(e => {
        const block = el("div", {},
          el("strong", {}, `${e.title}${e.company ? " — " + e.company : ""}`),
          el("div", { className: "muted small" }, `${e.location ? e.location + " • " : ""}${e.startDate || ""}${e.endDate ? " – " + e.endDate : ""}`),
          el("p", {}, e.description || "")
        );
        preview.experience.appendChild(block);
      });
    }

    // education
    preview.education.innerHTML = "";
    if (data.education.length === 0) {
      preview.education.innerHTML = "<div class='muted'>No education added</div>";
    } else {
      data.education.forEach(ed => {
        const block = el("div", {},
          el("strong", {}, `${ed.degree ? ed.degree + " — " : ""}${ed.school}`),
          el("div", { className: "muted small" }, `${ed.city ? ed.city + " • " : ""}${ed.startDate || ""}${ed.endDate ? " – " + ed.endDate : ""}`),
          el("p", {}, ed.description || "")
        );
        preview.education.appendChild(block);
      });
    }

    // projects
    preview.projects.innerHTML = "";
    if (data.projects.length === 0) {
      preview.projects.innerHTML = "<div class='muted'>No projects added</div>";
    } else {
      data.projects.forEach(p => {
        const block = el("div", {},
          el("strong", {}, p.name + (p.link ? " — " : "")),
          p.link ? el("a", { href: p.link, target: "_blank", rel: "noopener" }, p.link) : null,
          el("p", {}, p.description || "")
        );
        preview.projects.appendChild(block);
      });
    }

    // skills
    preview.skills.innerHTML = "";
    if (data.skills.length === 0) {
      preview.skills.innerHTML = "<div class='muted'>No skills added</div>";
    } else {
      data.skills.forEach(s => {
        const badge = el("span", { className: "skill-badge" }, `${s.name}${s.degree ? " • " + s.degree : ""}`);
        preview.skills.appendChild(badge);
      });
    }
  }

  // download JSON
  function downloadJSON() {
    const data = collectState();
    const filename = (data.fullName ? data.fullName.replace(/\s+/g, "_") : "resume") + ".json";
    const blob = new Blob([JSON.stringify(data, null, 2)], { type: "application/json" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    a.remove();
    URL.revokeObjectURL(url);
  }

  // reset form
  function resetForm() {
    if (!confirm("Reset the form and preview?")) return;
    document.getElementById("resume-form").reset();
    // clear multi lists and re-add one item
    Object.values(targets).forEach(t => t.innerHTML = "");
    ["achievements", "experience", "education", "projects", "skills"].forEach(addListItem);
    state.imageDataUrl = "";
    document.getElementById("photo-img").src = "";
    document.getElementById("photo-img").style.display = "none";
    document.getElementById("pv-photo").src = "";
    document.getElementById("pv-photo").style.display = "none";
    generatePreview();
  }

  // initial preview
  generatePreview();

})();