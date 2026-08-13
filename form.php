<!DOCTYPE html>
<html lang="fr">

  <form  action="thanks.php" method="post">
    <div>
      <label for="lastname">Nom :</label>
      <input type="text"  id="lastname"  name="user_lastname">
    </div>
    <div>
      <label for="firstname">Prénom :</label>
      <input type="text"  id="firstname"  name="user_firstname">
    </div>
    <div>
      <label  for="email">Courriel :</label>
      <input  type="email"  id="email"  name="user_email">
    </div>
    <div>
      <label for="phone">Numéro de téléphone :</label>
      <input type="tel" id="phone" name="user_phone">
    </div>
    <div>
      <label for="sujet">Choisissez votre sujet :</label>
      <select id="sujet" name="sujet">
      <option value="information">Informations</option>
      <option value="stage">Stage découverte</option>
      <option value="inscription">Incription</option>
</select>
    </div>
    <div>
      <label  for="message">Message :</label>
      <textarea  id="message"  name="user_message"></textarea>
    </div>
    <div  class="button">
      <button  type="submit">Envoyer votre message</button>
    </div>
  </form>

