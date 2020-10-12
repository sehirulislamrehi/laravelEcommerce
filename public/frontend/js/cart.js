//get carts
window.onload = () => {
    axios.get('/get_cart').then( res => {
        display_carts_item(res.data)
    })
}


//add to cart
$(document).ready(function(){
    $(".addCart").click( function(e){
        let id = e.target.dataset.id
        axios.post('/cart',{id}).then( res=> {
            display_carts_item(res.data)
        })
    })
})


function display_carts_item(items){
    document.getElementById('totalItems').innerHTML = items.length
    
    document.getElementsByClassName('table_cart')[0].innerHTML = ''
    items.forEach( value => {
        document.getElementsByClassName('table_cart')[0].innerHTML += `<tr>
                <td>
                    <img src="/images/products/${value.image}" style="width: 50px;" alt="">
                </td>
                <td>
                    ${value.name} <br>
                    ${value.total} Tk <br>
                    ${value.qty} x
                </td>
                <td>
                    <button class="badge badge-danger deleteCart" data-id="${value.id}" style="border: none; cursor: pointer">remove product
                    </button>
                </td>
            </tr>`                 
    })
    cartDelete()
}

function cartDelete(){
    let deleteButton = document.getElementsByClassName('deleteCart')
    for( let x in deleteButton ){
        deleteButton[x].onclick = e => {
           let id = e.target.dataset.id

           axios.delete(`/delete_cart/${id}`)
           .then( res => {
               if( res.data ){
                    cartDelete()
                    display_carts_item(res.data)
               }
           })
        }
    }
}