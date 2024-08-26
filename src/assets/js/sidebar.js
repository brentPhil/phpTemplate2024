// Immediately run this script to avoid flickering
(function() {
    const isExpanded = JSON.parse(localStorage.getItem('sidebarState'));
    if (!isExpanded) {
        document.documentElement.classList.add('sidebar-collapsed');
    }
})();

$(document).ready(function() {
    function toggleAndSave() {
        const $aside = $('#myAside');
        const $logo = $('#logo');
        const $title = $('#title');
        const $linkLabels = $('.linkLabel');
        const $html = $('html');

        const isExpanded = !$aside.hasClass('md:w-80');
        $aside.toggleClass('md:w-80', isExpanded);
        $logo.toggleClass('md:w-28', isExpanded);
        $title.toggleClass('md:block', isExpanded);
        $linkLabels.toggleClass('md:block', isExpanded);
        $html.toggleClass('sidebar-collapsed', !isExpanded);

        localStorage.setItem('sidebarState', isExpanded);
    }

    $('#toggleButton').click(toggleAndSave);
});