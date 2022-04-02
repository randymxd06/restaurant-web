<script>
    // Objeto con los Productos Seleccionados
    let products = []; 
    let subTotal = 0, total = 0;
    // Funcion para Agregar Productos
    function addProduct(p){
        let e = false;
        p.qty = 0;
        
        for(let i of products){
            if(i.name == p.name){
                e = true;
                i.qty+=1;
                break;
            }
        }
        
        if(!e){
            p.qty+=1;
            products.push(p);
        }

        refreshProduct();
    }

    // Funcion Para reducir productos
    function reduceProduct(id){
        //  Recorerr los productos agregadors
        
        for (let p = 0; p < products.length; p++){
            // If para verificar si el producto a eliminar existe en la lista
            if(products[p].id === id){
                // If para eliminar si la cantidad es igual a 1, de lo contrario reducir 1
                if(products[p].qty == 1){
                    products.splice(p, 1);
                }else{
                    products[p].qty-=1;
                }
                refreshProduct();
                return
            }
        }
    }

    // Funcion para actualizar los productos en el html
    const refreshProduct = function(){
        let listProductsHTML = "";
        total = 0;
        products.forEach(pro => {    
            let importe = Math.round((parseFloat(pro.qty*pro.price).toFixed(2))*100)/100;
            total = Math.round((total+importe)*100)/100;
            listProductsHTML += '<tr>'+
                                    '<td>'+pro.name+'</td>'+
                                    '<td>'+pro.qty+'</td>'+
                                    '<td>RD$'+importe+'</td>'+
                                    '<td><button onclick="reduceProduct('+ pro.id +')"><i class="far fa-trash-alt"></i></button></td>'+
                                '</tr>';
        });
        document.getElementById("add-products").innerHTML = listProductsHTML;
        document.getElementById('products').value = JSON.stringify(products, null, 3);
        document.getElementById('total_order').value = total;
        document.getElementById('order-subtotal').innerHTML = "" + total.toFixed(2);
        document.getElementById('order-total').innerHTML = "" + total.toFixed(2);
    } 

    // Seleccionar Mesa
    function selectTable(id){
        document.getElementById("id-mesa").innerHTML = '#'+id;
        document.getElementById('table_id').value = id;
    }

    // Seleccionar Cliente
    function selectCustomer(id, name){
        document.getElementById("customer-id").innerHTML = '' + name;
        document.getElementById('customer_id').value = id;
    }
    
  //   
</script>