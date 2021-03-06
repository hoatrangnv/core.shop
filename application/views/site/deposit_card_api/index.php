<?php
	$mr = [];

	$mr['discounts'] = function() use ($types)
	{
		ob_start();?>

		<table class="table table-bordered table-hover">

			<thead>
			<tr>
				<?php foreach ($types as $type): ?>
					<th><?php echo $type->name; ?></th>
				<?php endforeach; ?>
			</tr>
			</thead>

			<tbody>
			<tr>
				<?php foreach ($types as $type): ?>
					<td class="fontB"><?php echo $type->user_fee; ?>%</td>
				<?php endforeach; ?>
			</tr>
			</tbody>

		</table>

		<?php $body = ob_get_clean();

		return macro('mr::box')->box([
			'title'   => lang('title_discounts'),
			'content' => $body,
		]);
	};

	echo macro('mr::form')->form([

		'title' => lang('title_deposit_card'),

		'data' 	=> $input,
		
		'rows' => [
		
			'<div name="card_error" class="nNote nWarning hideit"></div>',

		    [
    		    'param' 	=> 'type',
    		    'type' 		=> 'custom',
    		    'name' 		=> lang('username'),
    		    'html'     	=> '<b style="color:red">'.$user->username.'</b>',
		    ],
		    
		    
			[
				'param' 	=> 'type',
				'type' 		=> 'select',
				'name' 		=> lang('card_type'),
				'values' 	=> array_pluck($types, 'name', 'id'),
				'req' 		=> true,
			],
		
			[
				'param' 	=> 'code',
				'name' 		=> lang('card_code'),
				'req' 		=> true,
				'attr' 		=> [
					'placeholder' => 'Nhập mã số sau lớp bạc mỏng',
				],
			],
		
			[
				'param' 	=> 'serial',
				'name' 		=> lang('card_serial'),
				'req' 		=> true,
				'attr' 		=> [
					'placeholder' => 'Nhập mã serial nằm sau thẻ',
				],
			],

		],

	]);

	//echo $mr['discounts']();
    
	//lich su gach the
	//widget('deposit_card_log')->newest();
	
	