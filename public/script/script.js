document.addEventListener("DOMContentLoaded", () => {
  const displayDateElement = document.getElementById("display_date");

  let dateNow = new Date();

  const prevDayBtn = document.getElementById("prev_arrow");
  const nextDayBtn = document.getElementById("next_arrow");
  const slotsList = document.querySelector(".slots_display ul");

  // formatage de la date
  const options = {
    weekday: "short",
    day: "numeric",
    month: "short",
    year: "numeric",
  };

  // tableau de créneaux horaires
  const timeSlots = [
    "9h-10h",
    "10h-11h",
    "11h-12h",
    "13h-14h",
    "14h-15h",
    "15h-16h",
    "16h-17h",
    "17h-18h",
  ];

  // créneaux réservés par date (clé: date en yyyy-mm-dd)
  const bookedSlots = {
    "2025-12-03": ["10h-11h", "17h-18h"],
    "2025-12-02": ["10h-11h", "14h-15h", "15h-16h"],
    "2025-12-01": ["9h-10h", "17h-18h"],
  };

  // formatage de la date en clé
  function formatDateKey(date) {
    return date.toISOString().split("T")[0];
  }

  // Mise à jour de l'affichage date et créneaux
  function updateDateDisplay() {
    const formattedDate = dateNow.toLocaleDateString("fr-FR", options);
    displayDateElement.textContent = formattedDate;
    updateTimeSlots();
  }

  // Mise à jour des créneaux
  function updateTimeSlots() {
    const dateKey = formatDateKey(dateNow);
    const reserved = bookedSlots[dateKey] || [];

    // Vider la liste
    slotsList.innerText = "";

    // Recréer les <li>
    timeSlots.forEach((slot) => {
      const li = document.createElement("li");
      li.textContent = slot;

      // Griser si réservé
      if (reserved.includes(slot)) {
              // navigation accessibilité
        li.classList.add("reserved");
        li.setAttribute("aria-disabled", "true");
      } else {
        li.setAttribute("tabindex", "0");
        li.setAttribute("role", "button");
        // ajouter un clic souris pour sélectionner le créneau
        li.addEventListener("click", () => {
          // décocher tous les autres
          const allSlots = slotsList.querySelectorAll("li");

          // cocher celui-ci
          li.classList.add("selected");
        });
        // clavier (Enter ou Space)
      li.addEventListener("keydown", (e) => {
        if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          li.click();
        }
      });
      }

      slotsList.appendChild(li);
    });
  }

  nextDayBtn.addEventListener("click", (event) => {
    event.preventDefault();
    dateNow.setDate(dateNow.getDate() + 1);
    updateDateDisplay();
  });

  prevDayBtn.addEventListener("click", (event) => {
    event.preventDefault();
    dateNow.setDate(dateNow.getDate() - 1);
    updateDateDisplay();
  });

  updateDateDisplay();
  document.getElementById("display_date").focus();

  // -------------------- Gestion des prestations, une seule checkbox à la fois --------------------
  const prestationCheckboxes = document.querySelectorAll(
    ".checkbox_box input[type='checkbox']"
  );
  prestationCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
      if (checkbox.checked) {
        // décocher tous les autres
        prestationCheckboxes.forEach((cb) => {
          if (cb !== checkbox) cb.checked = false;
        });
      }
    });
  });
});

// -------------------- Gestion du menu burger --------------------

document.addEventListener("DOMContentLoaded", function () {
  const trigger = document.getElementById("burger_menu_trigger");
  const menu = document.getElementById("mobile_menu");
  const closeMenuBtn = document.getElementById("close_menu");

  if (!trigger || !menu) return;

  function openMenu() {
    menu.classList.add("open");
    menu.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
  }
  function closeMenu() {
    menu.classList.remove("open");
    menu.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
  }
  function toggleMenu() {
    const isOpen = menu.classList.contains("open");
    if (isOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  }
  trigger.addEventListener("click", function (e) {
    e.preventDefault();
    console.log("Burger menu clicked");
    toggleMenu();
  });
  closeMenuBtn.addEventListener("click", function () {
    closeMenu();
  });

  menu.addEventListener("click", function (e) {
    if (e.target.tagName === "LI" || e.target.closest("a")) {
      closeMenu();
    }
  });
  document.addEventListener("click", function (e) {
    if (!menu.contains(e.target) && !trigger.contains(e.target)) {
      closeMenu();
    }
  });
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      closeMenu();
    }
  });
});

// -------------------- Bouton retour < Retour --------------------

const btnBack = document.getElementById("btn_back");
if (btnBack) {
  btnBack.addEventListener("click", function (e) {
    e.preventDefault();
    history.back();
  });
}

// --------------------checkbox afficher/masquer mot de passe (formulaire) -----------
function togglePassword() {
  const passwordInput = document.getElementById("password");
  const checkbox = document.getElementById("showPassword");

  if (checkbox.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}

// ----------------Prestations viewBook----------------

// ----Fonction de sélection/désélection de service----
function selectService(serviceId) {
  const currentUrl = new URL(window.location.href);
  const currentServiceId = currentUrl.searchParams.get("service");

  // Si on clique sur le service déjà sélectionné, on le désélectionne
  if (currentServiceId === serviceId.toString()) {
    currentUrl.searchParams.delete("service");
  } else {
    // Sinon, on sélectionne le nouveau service
    currentUrl.searchParams.set("service", serviceId);
  }

  window.location.href = currentUrl.toString();
}
