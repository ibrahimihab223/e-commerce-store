(() => {
const body = document.body;
const themeOptions = document.querySelectorAll("[data-theme]");
const menuToggle = document.querySelector(".menu-toggle");
const mobileMenu = document.querySelector(".mobile-menu");
const reduceMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)",
).matches;

const setTheme = (theme) => {
    const isDark = theme === "dark";
    body.classList.toggle("theme-dark", isDark);
    body.classList.toggle("theme-light", !isDark);
    themeOptions.forEach((option) => {
    option.setAttribute(
        "aria-current",
        option.dataset.theme === theme ? "page" : "false",
    );
    });
    try {
    localStorage.setItem("portfolio-theme", theme);
    } catch (error) {
      // The page still works when private browsing blocks localStorage.
    }
};

let savedTheme = null;
try {
    savedTheme = localStorage.getItem("portfolio-theme");
} catch (error) {
    savedTheme = null;
}

if (savedTheme === "light" || savedTheme === "dark") setTheme(savedTheme);

themeOptions.forEach((option) => {
    option.addEventListener("click", (event) => {
    event.preventDefault();
    setTheme(option.dataset.theme);
    });
});

const closeMenu = () => {
    if (!menuToggle || !mobileMenu) return;
    menuToggle.setAttribute("aria-expanded", "false");
    mobileMenu.setAttribute("aria-hidden", "true");
    mobileMenu.classList.remove("is-open");
};

if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", () => {
    const isOpen = menuToggle.getAttribute("aria-expanded") === "true";
    menuToggle.setAttribute("aria-expanded", String(!isOpen));
    mobileMenu.setAttribute("aria-hidden", String(isOpen));
    mobileMenu.classList.toggle("is-open", !isOpen);
    });
    mobileMenu
    .querySelectorAll("a")
    .forEach((link) => link.addEventListener("click", closeMenu));
    document.addEventListener("click", (event) => {
    if (
        !mobileMenu.contains(event.target) &&
        !menuToggle.contains(event.target)
    )
        closeMenu();
    });
}

const revealItems = document.querySelectorAll(
    ".reveal, .project-card, .about-copy, .contact-details",
);
revealItems.forEach((item) => item.classList.add("js-reveal"));

const contactForm = document.querySelector("[data-contact-form]");
if (contactForm) {
    const status = contactForm.querySelector("[data-form-status]");
    const submitButton = contactForm.querySelector('button[type="submit"]');

    contactForm.addEventListener("submit", async (event) => {
    event.preventDefault();
    status.textContent = "جار إرسال الرسالة...";
    status.className = "form-status";
    submitButton.disabled = true;

    try {
        const response = await fetch("index.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
        body: JSON.stringify(Object.fromEntries(new FormData(contactForm))),
        });
        const result = await response.json();
        if (!response.ok)
        throw new Error(result.message || "تعذر إرسال الرسالة.");
        status.textContent = result.message;
        status.classList.add("is-success");
        contactForm.reset();
    } catch (error) {
        status.textContent =
        error.message || "تعذر إرسال الرسالة. حاول مرة أخرى.";
        status.classList.add("is-error");
    } finally {
        submitButton.disabled = false;
    }
    });
}

if (reduceMotion || !("IntersectionObserver" in window)) {
    revealItems.forEach((item) => item.classList.add("is-visible"));
} else {
    const observer = new IntersectionObserver(
    (entries, currentObserver) => {
        entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
    entry.target.classList.add("is-visible");
        currentObserver.unobserve(entry.target);
        });
    },
    { threshold: 0.12 },
    );
    revealItems.forEach((item) => observer.observe(item));
}

    if (!reduceMotion) {
    const finePointer = window.matchMedia(
    "(hover: hover) and (pointer: fine)",
    ).matches;
    const pointerLayers = document.querySelectorAll(
    ".hero-copy, .hero-profile, .section-heading, .about-copy, .contact-details",
    );
    const projectCards = document.querySelectorAll(".project-card");
    let targetX = 0;
    let targetY = 0;
    let currentX = 0;
    let currentY = 0;
    let animationFrame = null;
    let pointerActive = false;

    const renderDepth = () => {
      currentX += (targetX - currentX) * 0.08;
      currentY += (targetY - currentY) * 0.08;
      body.style.setProperty("--pointer-x", `${currentX * 50 + 50}%`);
      body.style.setProperty("--pointer-y", `${currentY * 50 + 50}%`);
    pointerLayers.forEach((layer, index) => {
        const depth = index % 2 === 0 ? 12 : 7;
        layer.style.setProperty("--depth-x", `${currentX * depth}px`);
        layer.style.setProperty("--depth-y", `${currentY * depth}px`);
    });
    if (pointerActive) animationFrame = requestAnimationFrame(renderDepth);
    };

    const updatePointer = (x, y) => {
      targetX = Math.max(-1, Math.min(1, (x / window.innerWidth - 0.5) * 2));
      targetY = Math.max(-1, Math.min(1, (y / window.innerHeight - 0.5) * 2));
    };

    if (finePointer) {
        window.addEventListener(
        "pointermove",
        (event) => {
        pointerActive = true;
        updatePointer(event.clientX, event.clientY);
        if (!animationFrame)
            animationFrame = requestAnimationFrame(renderDepth);
        },
        { passive: true },
    );
    window.addEventListener(
        "pointerleave",
        () => {
        pointerActive = false;
        targetX = 0;
        targetY = 0;
        if (!animationFrame)
            animationFrame = requestAnimationFrame(renderDepth);
        },
        { passive: true },
    );

    projectCards.forEach((card) => {
        card.addEventListener(
        "pointermove",
        (event) => {
            const bounds = card.getBoundingClientRect();
            const rotateX =
              ((event.clientY - bounds.top) / bounds.height - 0.5) * -8;
            const rotateY =
              ((event.clientX - bounds.left) / bounds.width - 0.5) * 8;
            const lightX = ((event.clientX - bounds.left) / bounds.width) * 100;
            const lightY = ((event.clientY - bounds.top) / bounds.height) * 100;
            card.style.setProperty("--card-rotate-x", `${rotateX}deg`);
            card.style.setProperty("--card-rotate-y", `${rotateY}deg`);
            card.style.setProperty("--light-x", `${lightX}%`);
            card.style.setProperty("--light-y", `${lightY}%`);
        },
        { passive: true },
        );
        card.addEventListener("pointerleave", () => {
        card.style.removeProperty("--card-rotate-x");
        card.style.removeProperty("--card-rotate-y");
        card.style.removeProperty("--light-x");
        card.style.removeProperty("--light-y");
        });
    });
    }

    document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
        pointerActive = false;
        if (animationFrame) cancelAnimationFrame(animationFrame);
        animationFrame = null;
    }
    });

    window.addEventListener(
    "pagehide",
    () => {
        if (animationFrame) cancelAnimationFrame(animationFrame);
    },
    { once: true },
    );
}
})();
