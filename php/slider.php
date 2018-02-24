<div class="demo_wrapper">
			<div class="demo_block">
			<ul id="demo1">
        <?php
        $reponse=$bdd->query('SELECT * FROM slide');
        while ($donnees = $reponse->fetch())
        {
        ?>
				<li><a href="#slide1"><img src="admin/<?php echo $donnees['photo'] ?>" alt="<?php echo $donnees['legende'] ?><br/> <a href='<?php echo $donnees['lien'] ?>'>En savoir plus</a>"></a></li>
        <?php
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>
      </ul>
		</div>
		</div>
