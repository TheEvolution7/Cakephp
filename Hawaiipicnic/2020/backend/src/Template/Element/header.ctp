<?php  
	$banners = $this->getCache('banners_' . $configs['language']);
	$users = $this->Session->read('Auth.User');
	$session = $this->getRequest()->getSession();
	$carts = $session->read('Cart');
?>
<aside id="pwe-aside">
	<!-- Logo -->
	<h1 id="pwe-logo">
		<a href="<?= $this->url->build(['controller' => 'Pages','action'=> 'home']) ?>"><?= $banners[11][1]->title ?></a>
	</h1>
	<!-- Menu -->
	<nav id="pwe-main-menu">
		<ul>
			<li <?php echo $this->request->getParam('action') == 'home' ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Pages','action'=> 'home']) ?>">Home</a></li>
			<li <?php echo $this->request->getParam('action') == 'about' ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Pages','action'=> 'about']) ?>">About Us</a></li>
			<li <?php echo $this->request->getParam('action') == 'service' || $this->request->getParam('action') == 'serviceDetails'  ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Articles', 'action' => 'service']) ?>">Services</a></li>
			<li <?php echo $this->request->getParam('action') == 'addOn' ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Albums', 'action' => 'addOn']) ?>">Add-Ons</a></li>
			<li <?php echo $this->request->getParam('action') == 'activities' ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Pages', 'action' => 'activities']) ?>">Activities</a></li>
			<li <?php echo $this->request->getParam('action') == 'partyfavors' ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Pages','action'=> 'partyfavors']) ?>">Partyfavors</a></li>
			<li <?php echo $this->request->getParam('action') == 'snippet' ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Albums', 'action' => 'snippet']) ?>">Snippets</a></li>
			<li <?php echo $this->request->getParam('action') == 'news' || $this->request->getParam('action') == 'newsDetails' || $this->request->getParam('action') == 'category'  ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Articles', 'action' => 'news']) ?>">Our News</a></li>
			<li <?php echo $this->request->getParam('action') == 'faq' ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Pages','action'=> 'faq']) ?>">FAQs</a></li>
			<li <?php echo $this->request->getParam('action') == 'contact' ? 'class="pwe-active"' : '' ?>><a href="<?= $this->url->build(['controller' => 'Pages','action'=> 'contact']) ?>">Contact</a></li>
		<?php if(empty($users)): ?>
			<li <?php echo $this->request->getParam('action') == 'login' ? 'class="pwe-active"' : '' ?>><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'login']) ?>">Sign In</a></li>
		<?php else: ?>
			<li><a href="<?= $this->Url->build(['controller'=> 'Users','action' => 'index']) ?>"><?= 'Hi' .' '.$users['full_name'] ?></a></li>
			<li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Logout</a></li>
		<?php endif ?>
			<br>
		<?php if(isset($carts)): ?>
			<div class="btn-booknow"><a href="<?= $this->url->build(['controller' => 'Carts','action'=> 'bookingInfo']) ?>"><span>Book Now</span></a></div>
		<?php else: ?>
			<div class="btn-booknow"><a href="<?= $this->url->build(['controller' => 'Products','action'=> 'booking']) ?>" target="_blank"><span>Book Now</span></a></div>
		<?php endif ?>
			
		</ul>
	</nav>
	<!-- Sidebar Footer -->
	<div class="pwe-footer">
		<div class="separator"></div>
		<p><?= $banners[11][0]->title ?></p>
		<div class="social"> 
		<?php foreach($banners[13] as $banner): ?>
			<a href="<?= $banner->url ?>" target="_blank"><?= $banner->description ?></a> 
		<?php endforeach ?>
		</div>
	</div>
</aside>