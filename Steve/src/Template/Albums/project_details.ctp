<?php 
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>Project Details</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Albums','action' => 'projects']) ?>">
                            Projects
                        </a>
                    </li>
                    <li class="active">Project Details</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_top_150 section_padding_bottom_150">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h2 class="section_header"><?= $project->album_categories[0]->title ?>
				</h2>
				<p class="small-text"><?= $project->title ?></p>
				<hr class="divider_30_3 zebra_bg divider_left">
				<p>
					<?= $project->description ?>
				</p>
			</div>
			<div class="col-md-5">
				<div class="entry-thumbnail2">
					<!-- map -->
					<img src="<?= $this->Url->build('/uploads/albums/'.$project->id . DS . $project->album_images[0]->image) ?>" alt="<?= $project->title ?>">
				</div>
			</div>
						
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="entry-thumbnail2">
					<img src="<?= $this->Url->build('/uploads/albums/'.$project->id . DS . $project->image) ?>" alt="<?= $project->title ?>">
				</div>
			</div>
		</div>
		<div class="row">
		<?php foreach(array_slice($project->album_images,2,5) as $img): ?> 
			<div class="col-sm-6">
				<div class="entry-thumbnail2">
					<img src="<?= $this->Url->build('/uploads/albums/'.$project->id . DS . $img->image) ?>" alt="<?= $img->title ?>">
				</div>
			</div>
		<?php endforeach ?>
		</div>
	</div>
</section>
