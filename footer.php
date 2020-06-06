<style>
    /* The Modal (background) */
.modal-eEgg {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content-eEgg {
    margin: 5% auto 15% auto;
    width: auto;
    max-width: 700px;
    /* Animations */
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s;
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

.caption {
    font-family: Roboto-Regular;
    font-size: 18px;
    padding: 2px 16px;
    color: white;
    background: #b71c1c;
    margin-left: 10%;
    margin-right: 10%;
}

img[id="eEgg_image"] {
    display: block;
    margin-left: auto;
    margin-right: auto;
    height: 80%;
    width: 80%;
    max-width: 700px;
}

</style>
    <!-- The Easter Egg Modal -->
    <div id="eEgg_modal" class="modal-eEgg">
        <div class="modal-content-eEgg">
            <div class="caption" style="border-radius: 5px 5px 0 0;">
                <h3>They float,' it growled, 'they float, Georgie, and when
                    you’re down here with me, you’ll float, too–'</h3>
            </div>
            <div class="caption" style="border-radius: 0 0 5px 5px;">
                <h3 id="footer" style="text-align:center;">Going back in 20s...</h3>
            </div>
        </div>
    </div>

</body>
</html>