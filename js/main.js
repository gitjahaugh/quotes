const initApp = () => {
    document.getElementById("resetQuoteForm").addEventListener("click", resetQuoteForm);
}

document.addEventListener("DOMContentLoaded", initApp);

const resetQuoteForm = () => {
    //reset select menus
    const selectMenuOptions = document.querySelectorAll("#make_selection select option");
    selectMenuOptions.forEach(option => {
        if (option.text == "View All Authors" || 
            option.text == "View All Categories") {
                option.selected = true;
                option.defaultSelected = true;
        } else {
            option.selected = false;
            option.defaultSelected = false;
        }
    });
}