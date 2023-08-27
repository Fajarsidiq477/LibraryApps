// LIT Components
import "./components";

import * as bootstrap from "bootstrap";

// pages
import UserIndex from "./pages/UserIndex";
import UserProfile from "./pages/UserProfile";
import Login from "./pages/auth/Login";
import UserBorrowed from "./pages/UserBorrowed.js";
import Create1 from "./pages/LendBooks/create1";
import AdminBook from "./pages/admin/book/AdminBook.js";
import AdminEditBook from "./pages/admin/book/AdminEditBook.js";
import AdminAddBook from "./pages/admin/book/AdminAddBook.js";
import LendBooks from "./pages/admin/lend/LendBooks.js";

const scriptSources = {
    userIndex: UserIndex,
    login: Login,
    userProfile: UserProfile,
    userBorrowed: UserBorrowed,
    LendBooksCreate1: Create1,
    adminBook: AdminBook,
    adminEditBook: AdminEditBook,
    adminAddBook: AdminAddBook,
    lendBooks: LendBooks,
};

const scriptSource = document.querySelector("#dataBody").dataset.source;
const detectScriptSources = () => scriptSources[scriptSource];

window.addEventListener("DOMContentLoaded", async () => {
    const source = detectScriptSources();

    if (source) {
        source.init();
    }
});

$('.btn').on('click', function(e) {
    if ($(this).hasClass('disable')) {
        e.preventDefault();
    }
});
