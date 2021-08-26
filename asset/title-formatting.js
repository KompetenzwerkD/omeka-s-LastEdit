const linebreak = "__"

$( document).ready( function() {
    $( ".title" ).each(function () {
        const text = this.innerHTML
        this.innerHTML = text.replaceAll(linebreak, "&nbsp;&nbsp;&nbsp;&nbsp; ")
    })

    $(".alternate").each(function () {
        const text = this.innerHTML
        this.innerHTML = text.replaceAll(linebreak, "<br />")
    })

    $(".property").each(function () {
        const text = this.innerHTML
        this.innerHTML = text.replaceAll(linebreak, "<br />")
    })    

    $(".resource-name").each(function () {
        const text = this.innerHTML
        this.innerHTML = text.replaceAll(linebreak, "<br />")
    })        

    $(".collapse").each(function () {
        this.className="expand"
    })
})
