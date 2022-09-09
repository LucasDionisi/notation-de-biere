<div id="delete-modal" class="modal">
	<div class="modal-content">
    	<div class="modal-top">
        	<h2>Supprimer un avis</h2>
            <a id="close-delete-modal" href="#"><p>&#x2715</p></a>
        </div>
        <div class="modal-main">
        	<form method="POST" action="">
        		<p>Es-tu certain de vouloir supprimer cet avis ?</p>
                <input type="text" name="advice-id" hidden>
                <div class="btnGroup">
	                <button type="submit" name="cancelButton" class="cancel-btn">NON 😬</button>
	                <button type="submit" name="submitButton" class="delete-btn">OUI 😭</button>
                </div>
            </form>
        </div>
    </div>
</div>