// LIT Components
import "./components";

import * as bootstrap from "bootstrap";

// pages
import UserIndex from "./pages/UserIndex";
import UserProfile from "./pages/UserProfile";
import Login from "./pages/auth/Login";

const scriptSource = document.querySelector("#dataBody").dataset.source;

const scriptSources = {
    userIndex: UserIndex,
    login: Login,
    userProfile: UserProfile,
};

const detectScriptSources = () => scriptSources[scriptSource];

window.addEventListener("DOMContentLoaded", async () => {
    const source = detectScriptSources();
    if (source) {
        source.init();
    }
});
