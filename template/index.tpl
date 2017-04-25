<!--  <div class="row">
    <form method="post" action ='message.php'>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="hidden" name="id" value={$msgmodif}>
          <textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
        </div>
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
      </div>
    </form>
  </div>  -->

{foreach from=$data item=donnee}
  <hr/>
  {$donnee.contenu}</br>
  {$donnee.date_emission|date_format:"%D à %H h %M m %S s"}</br>
    {if $connecte == true}
      <a href="index.php?id={$donnee.id}"><button type="button" class="btn btn-info">Modifier</button></a></br>
      <a href="suppression-msg.php?id={$donnee.id}"><button type="button" class="btn btn-danger">Supprimer</button></a></br>
    {/if}
{/foreach}
</div>