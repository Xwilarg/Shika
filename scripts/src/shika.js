const url = document.currentScript.getAttribute("url");
if (url === null) {
    console.error("URL is not set");
} else {
    const id = document.currentScript.getAttribute("id") ?? "0";
    const body = {
        lang: navigator.language,
        referrer: document.referrer,
        href: location.href,
        id: id
    };
    const headers = {
        type: 'application/json',
    };
    const blob = new Blob([JSON.stringify(body)], headers);
    navigator.sendBeacon(url, blob);
}