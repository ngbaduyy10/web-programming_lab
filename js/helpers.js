export function getLimitByScreenSize() {
    if ($(window).width() >= 1200) {
        return 8;
    } else if ($(window).width() >= 992) {
        return 6;
    } else if ($(window).width() >= 576) {
        return 4;
    } else {
        return 2;
    }
}