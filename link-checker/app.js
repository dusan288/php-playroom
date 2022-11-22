console.log('Link checker app working...')

const inputDom = document.getElementById('link')
inputDom.onchange = (e) => {
    
    checkLink()
}

const checkLink = () => {
    const link = document.getElementById('link').value
    console.log(`Link to check: ${link}`)
    fetch(`/link_checker.php?link=${link}`)
    .then(res => res.json())
    .then(data => console.log(data))
    .catch(error => console.log(error))
}