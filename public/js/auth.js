export default function getApiToken() {
    return fetch(`/api/token`)
        .then(res => res.text())
        .then(res => {
            return res;
        })
}
