async function cargar(url){
    const response = await fetch(url);
    if (!response.ok){
        throw new Error("HTTP error! status");
    }
    return response.json();
}
/*
function pedirPosts(){
    let url = 'https://jsonplaceholder.typicode.com/posts';
    fetch(url).then(response => response.json()).then(json => console.log(json.title));
}*/