<?php

use yii\helpers\Html; 
use yii\grid\GridView; 
use yii\jui\DatePicker;
use yii\helpers\Url;
use app\models\Products;
$product = Products::find()->where(['id' => $_GET['id']])->one();
$this->title = 'Бронирование'; 
$this->params['breadcrumbs'][] = $this->title; 
?> 


<div class="products-index"> 

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?> 
	
   <div class="booking-form-date">
	<h3>Выберите гостиничный номер</h3>
	</div>
</div>

<div class="hotel-rooms">
<?php $mainImg = $product->getImage['img']; ?>


<?= GridView::widget([ 
		'dataProvider' => $dataProvider, 
        'filterModel' => $searchModel,
		'summary' =>'',
		'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'columns' => [
             'img' => [
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
                return Html::img(Url::toRoute($data->img),[
                    'alt'=>'yii2 - картинка в gridview',
                    'style' => 'width:250px;'
                ]);
				},
			],
			'name',
			[
				'attribute' => 'description',
				'label' => 'sadasd',
				'contentOptions' => ['class' => 'description', 'style' => ''],
				'format' => 'ntext',
				'headerOptions' => ['class' => '']
			],
            [
				'attribute' => 'price',
				'label' => 'sadasd',
				'contentOptions' => ['class' => 'fa fa-rub', 'style' => ' position: relative;
    color:  #f59500;
    font-size: 27px;
   
	'],
				'format' => 'text',
				'headerOptions' => ['class' => '']
			],
						
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{/reservation}', // кнопка просмотра, 
				'buttons' => [
					'/reservation' => function ($url,$model,$key) {
                    return Html::a('Забронировать', $url, ['class' => 'listproducts-element-buttons', 'name' => 'contact-button']);
                },
				],
			],
            /*'id',
            'category',
            
           'visible',
            'products_id',
			*/
					 
        ], 
    ]); ?> 
</div>
