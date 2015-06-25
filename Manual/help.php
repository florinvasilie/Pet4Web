<!DOCTYPE html>
<html>
<head>
	<title>Ajutor Pet4Web</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
	*{
		box-sizing:border-box;
	}
	.content{
		margin: 0 10px 0 10px;
		padding: 40px;
	}
	h1{
		text-align: center;
	}
	a {
		text-decoration: none;
	}
	a:hover{
		text-decoration: underline;
	}
	a:visited{
		color: #520052;
	}
	p{
		width: 0 auto;
	}
	#sterge{
		text-indent: 15px;
	}
	#editeaza{
		text-indent: 15px;
	}
	nav{
		padding: 20px;
	}
	li {
		list-style-type: square;
		font-size: 20px;
		display: inline;
		margin: 10px;
	}
	img{
		width: 0 auto;
		border:solid;
	}
	body{
		margin: 0 20px 0 20px;
		width: 0 auto;
		position: center;
		padding: 10px;
		background-color: #F5F0FF;
	}
	</style>
</head>
<body>
	<nav>
		<ul>
			<li><a href="#login" title="Logare">Logare</a></li>
			<li><a href="#logout" title="Delogare">Delogare</a></li>
			<li><a href="#register" title="Inregistrare">Inregistrare</a></li>
			<li><a href="#petnoua" title="Petitie noua">Petitie noua</a></li>
			<li><a href="#rasfoieste" title="Rasfoieste">Rasfoieste</a></li>
			<li><a href="#search" title="Cauta">Cauta</a></li>
			<li><a href="#contact" title="Contact">Contact</a></li>
			<li><a href="#contulmeu" title="Contul meu">Contul meu</a></li>
			<li><a href="#editeaza" title="Editeaza cont">Editeaza cont</a></li>
			<li><a href="#sterge" title="Sterge o petitie postata">Sterge petitie postata</a></li>
			<li><a href="#admin" title="Admin">Admin</a></li>
		</ul>
	</nav>
	<div class="content">
	<h1>Manual de utilizare Pet4Web</h1>
	<section id="login">
		<h2>Logarea pe sit</h2>
		<p>Pentru a va loga pe site, apasati butonul <b>Login</b> si apoi va introduceti numele de utilizator si parola pentru a continua.</p>
		<img src="login1.png">
		<img src="login2.png">
	</section>
	<section id="logout">
		<h2>Delogarea de pe sit</h2>
		<p>Pentru a va deloga apasati butonul <b>Logout</b> din orice pagina a situlul.</p>
	</section>
	<section id="register">
		<h2>Inregistrarea pe sit</h2>
		<p>Pentru a va crea un cont pe sit apasati pe butonul de <b>Login</b> de pe orice pagina a sitului apoi apasati butonul <b>Cont nou</b>. Apoi veti fi redirectat spre pagina de register. Aici va veti introduce datele cerute si apoi apasati butonul <b>Trimite</b> </p>
		<img src="login1.png">
		<img src="register1.png">
		<img src="register2.png">
	</section>
	<section id="petnoua">
		<h2>Postarea unei petitii</h2>
		<p>Puteti posta o petitie dupa ce va-ti logat pe sit. Pentru a posta o petitie apasati pe butonul <b>Petitie noua</b> din bara de meniu. Aici veti completa campurile cu datele dorite si apoi apasati butonul <b>Posteaza</b>.</p>
		<img src="petitienoua.png">
	</section>
	<section id="rasfoieste">
		<h2>Vizualizarea tuturor petitiilor</h2>
		<p>Pentru a vizualiza toate petitiile de pe sit apasati pe butonul <b>Rasfoieste</b> din bara de meniu. Va vor fi afisate toate petitiile postate pe toate temele. Daca doriti sa vedeti petitii doar dintr-o categorie apasati pe butonul corespunzator categoriei respective din bara laterala din stanga.</p>
		<img src="rasfoieste.png">
	</section>
	<section id="search">
		<h2>Cautarea unei petitii dupa nume</h2>
		<p>Pentru a cauta o anumita petitie, introduceti numele petitiei in casuta de cautare din partea stanga si apasati tasta <b>Enter</b>.</p>
		<img src="search.png">
	</section>
	<section id="contact">
		<h2>Contactarea adminilor</h2>
		<p>Pentru a putea adresa o intrebare adminilor sau daca vreti sa ne transmiteti un feedback apasati butonul <b>Contact</b> din bara de meniu si apoi completati campurile din formular.</p>
		<img src="contact.png">
	</section>
	<section id="contulmeu">
		<h2>Accesarea contului de utilizator</h2>
		<p>Daca doriti sa stergeti o petitie sau sa va modificati datele de utilizator atunci trebuie sa apasati butonul <b>Contul meu</b> din bara de meniu si apoi veti fi redirecat pe pagina contului dumneavoastra. Din aceasta pagina puteti sa va modificati datele contului si sa stergeti din petitiile postate.</p>
		<img src="user.png">
		<section id="sterge">
			<h3>Stergere petitie</h3>
			<p>Pentru a sterge o petitie postata de dumneavoastra doar apasati butonul <b>Stergere</b> din druptul numelui petitie pe care doriti sa o stergeti.</p>
			<img src="sterge.png">
		</section>
		<section id="editeaza">
			<h3>Editeaza date utilizator</h3>
			<p>Pentru a edita datele dumneavoastra apasati butonul <b>Editeaza date</b> si veti fi redirectat pe pagina de modificare a datelor. De aici puteti modifica numele dumneavoastra, parola sau data nasterii. Numele de utilizator si adresa de email nu pot fi modificate.</p>
			<img src="editeaza.png">
			<img src="editeaza2.png">
		</section>
	</section>
	<section id="admin">
		<h2>Zona admin</h2>
		<p>Pentru a putea accesa zona de admin trebuie doar sa introduceti din pagina de login numele de utilizator si parola de administrator. Un cont de administrator nu poate fi creat decat de administratorul bazei de date. Daca numele de utilizator si parola corespund cu cele ale vreunui admin atunci veti fi redirectat in zona de admin. Aici puteti genera rapoarte in formatele <em>PDF, CSV si HTML</em>.</p>
		<img src="admin.png">
	</section>
</div>


</body>
</html>