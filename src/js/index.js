import "../sass/main.scss";

// LIT Components
import "./components";

import { Dropdown } from "bootstrap";

// pages
import UserIndex from "./pages/UserIndex";
import UserProfile from "./pages/UserProfile";

const scriptSource = document.querySelector("body").dataset.source;
const scriptSources = {
    userIndex: UserIndex,
    userProfile: UserProfile,
};

const detectScriptSources = () => scriptSources[scriptSource];

window.addEventListener("DOMContentLoaded", async () => {
    const source = detectScriptSources();
    if (source) {
        source.init();
    }
});
