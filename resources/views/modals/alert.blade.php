

<style>


    .myAlert{
        width: 100%;
        height: 100%;
        
        background-color: rgba(0, 0, 0, 0.5);
        position: fixed;
        display: flex;
        z-index: 100;
    }

    .myAlert-card{
        background-color: rgb(255, 255, 255);
        position: relative;
        width: 60%;
        margin: auto;
        margin-top: 20%;

        border-radius: 20px;
    }

    .myAlert-content{
        font-weight: bold;
        font-size: 2rem;
        color:rgb(0, 0, 0);
        padding: 2rem;
    }

    .bi:hover{
        cursor: pointer;
    }

    .myAlert-header{
        text-align: end;
        padding: 1rem;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    @media (width <= 700px){
        .myAlert-content{
            font-size: 1.2rem;
            
        }
        .myAlert-card {
            width: 90%;
        }

        .myAlert-header{
            padding-block: 0.4rem;
        }
        .myAlert-content{
            padding-block: 1rem;
        }
    }
    
</style>



<div class="myAlert" id="miAlerta">
    <div class="myAlert-card">

        <div class="myAlert-header {{$type}}">
            <i onclick="document.getElementById('miAlerta').remove();" class="bi bi-x-lg "></i>
        </div>

        <div class="myAlert-body">
            <div class="myAlert-content">
                {{$msg}} !!
            </div>
        </div>

    </div>


</div>