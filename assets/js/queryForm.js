    const queryForm = document.querySelector("#queryForm");
    queryForm.addEventListener("submit",async (e)=>{
        e.preventDefault();
        const messageContainer = document.querySelector(".loader-container");
        messageContainer.style.display = "flex";
        const form = e.target;
        const data = new FormData(form);
        data.append("queryForm", "true");
        const res = await insertData(data);
        if (res.status == "success") {
        messageContainer.classList.add("success");
        messageContainer.innerHTML = `<p>${res.message}</p>`;
        setTimeout(()=>{
        messageContainer.style.display = "none";
        },5000);

        document.querySelector("#submitQuery").disabled = true;
        form.reset();
    } else {
        messageContainer.classList.add("error");
        messageContainer.innerHTML = `<p>${res.message}</p>`;
        setTimeout(()=>{
        messageContainer.style.display = "none";
        },5000);

        document.querySelector("#submitQuery").disabled = false;
    }
    })

    async function postData(data){
    return await fetch("./pages/submitForm.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
        })
        .then((res) => res.json())
        .catch((err) => {err});
    }

    function insertData(formData) {
    const data = Object.fromEntries(formData.entries());
    console.log(data)
    return postData(data);
    }