<?php

use common\models\Order;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var common\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flex flex-col gap-5 md:gap-7 2xl:gap-10">
	<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
		<div class="data-table-common data-table-one max-w-full overflow-x-auto">
			<div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

				<?= GridView::widget(['dataProvider' => $dataProvider, 'layout' => '<div class="datatable-top">
	<div class="datatable-dropdown">
		<label>
			<select class="datatable-selector">
				<option value="5">5</option>
				<option
					value="10"
					selected="">10
				</option>
				<option value="15">15</option>
				<option value="-1">All</option>
			</select> entries per page
		</label>
	</div>
	<div class="datatable-search">
		<input
			class="datatable-input"
			placeholder="Search..."
			type="search"
			title="Search within table"
			aria-controls="dataTableOne">
	</div>
</div>
<div class="datatable-container">
	{items}
</div>
<div class="datatable-bottom">
	<div class="datatable-info">Showing 1 to 10 of 16 entries</div>
	<nav class="datatable-pagination">
		<ul class="datatable-pagination-list">
			<li class="datatable-pagination-list-item datatable-hidden datatable-disabled"><a
				data-page="1"
				class="datatable-pagination-list-item-link">‹</a></li>
			<li class="datatable-pagination-list-item datatable-active"><a
				data-page="1"
				class="datatable-pagination-list-item-link">1</a></li>
			<li class="datatable-pagination-list-item"><a
				data-page="2"
				class="datatable-pagination-list-item-link">2</a></li>
			<li class="datatable-pagination-list-item"><a
				data-page="2"
				class="datatable-pagination-list-item-link">›</a></li>
		</ul>
	</nav>
</div>
					', 'columns' => [['attribute' => 'phonenum', 'encodeLabel' => false, 'label' => '<div class="datatable-sorter">
                          <div class="flex items-center gap-1.5">
                            <p>Phone Number</p>
                            <div class="inline-flex flex-col space-y-[2px]">
                              <span class="inline-block">
                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5 0L0 5H10L5 0Z" fill=""></path>
                                </svg>
                              </span>
                              <span class="inline-block">
                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill=""></path>
                                </svg>
                              </span>
                            </div>
                          </div>
                        </a>',], ['attribute' => 'address', 'encodeLabel' => false, 'label' => '<div class="datatable-sorter">
                          <div class="flex items-center gap-1.5">
                            <p>Address</p>
                            <div class="inline-flex flex-col space-y-[2px]">
                              <span class="inline-block">
                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5 0L0 5H10L5 0Z" fill=""></path>
                                </svg>
                              </span>
                              <span class="inline-block">
                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill=""></path>
                                </svg>
                              </span>
                            </div>
                          </div>
                        </a>',], ['attribute' => 'processed','content' => function (Order $model) {
					if ($model->processed) {
						return '
					<p
						class="inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success"
					>
						Processed
					</p>
			';
					} else {
						return '
					<p
						class="inline-flex rounded-full bg-danger bg-opacity-10 px-3 py-1 text-sm font-medium text-danger"
					>
						Not Processed
					</p>
						';
					}
				} ,'encodeLabel' => false, 'label' => '<div class="datatable-sorter">
                          <div class="flex items-center gap-1.5">
                            <p>Processed</p>
                            <div class="inline-flex flex-col space-y-[2px]">
                              <span class="inline-block">
                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5 0L0 5H10L5 0Z" fill=""></path>
                                </svg>
                              </span>
                              <span class="inline-block">
                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill=""></path>
                                </svg>
                              </span>
                            </div>
                          </div>
                        </a>',], ['class' => ActionColumn::className(), 'urlCreator' => function ($action, Order $model, $key, $index, $column) {
					return Url::toRoute([$action, 'id' => $model->id]);
				}, 'template' => '{view}'],], 'tableOptions' => ['class' => 'table w-full table-auto datatable-table', 'id' => "dataTableOne"], 'filterRowOptions' => ['class' => null, 'id' => '']]); ?>
			</div>
		</div>
	</div>
	<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
		<!--        --><?php //= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
		<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		<div class="data-table-common data-table-one max-w-full overflow-x-auto">
			<div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
				<div class="datatable-top">
					<div class="datatable-dropdown">
						<label>
							<select class="datatable-selector">
								<option value="5">5</option>
								<option
									value="10"
									selected="">10
								</option>
								<option value="15">15</option>
								<option value="-1">All</option>
							</select> entries per page
						</label>
					</div>
					<div class="datatable-search">
						<input
							class="datatable-input"
							placeholder="Search..."
							type="search"
							title="Search within table"
							aria-controls="dataTableOne">
					</div>
				</div>
				<div class="datatable-container">
					<table
						class="table w-full table-auto datatable-table"
						id="dataTableOne">
						<thead>
						<tr>
							<th
								data-sortable="true"
								style="width: 17.883895131086142%;"><a
									href="#"
									class="datatable-sorter">
									<div class="flex items-center gap-1.5">
										<p>Name/ID</p>
										<div class="inline-flex flex-col space-y-[2px]">
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 0L0 5H10L5 0Z"
														fill=""></path>
												</svg>
											</span>
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
														fill=""></path>
												</svg>
											</span>
										</div>
									</div>
								</a></th>
							<th
								data-sortable="true"
								style="width: 15.355805243445692%;"><a
									href="#"
									class="datatable-sorter">
									<div class="flex items-center gap-1.5">
										<p>Position</p>
										<div class="inline-flex flex-col space-y-[2px]">
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 0L0 5H10L5 0Z"
														fill=""></path>
												</svg>
											</span>
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
														fill=""></path>
												</svg>
											</span>
										</div>
									</div>
								</a></th>
							<th
								data-sortable="true"
								style="width: 14.325842696629213%;"><a
									href="#"
									class="datatable-sorter">
									<div class="flex items-center gap-1.5">
										<p>BDay</p>
										<div class="inline-flex flex-col space-y-[2px]">
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 0L0 5H10L5 0Z"
														fill=""></path>
												</svg>
											</span>
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
														fill=""></path>
												</svg>
											</span>
										</div>
									</div>
								</a></th>
							<th
								data-sortable="true"
								style="width: 20.224719101123593%;"><a
									href="#"
									class="datatable-sorter">
									<div class="flex items-center gap-1.5">
										<p>Email/Phone</p>
										<div class="inline-flex flex-col space-y-[2px]">
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 0L0 5H10L5 0Z"
														fill=""></path>
												</svg>
											</span>
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
														fill=""></path>
												</svg>
											</span>
										</div>
									</div>
								</a></th>
							<th
								data-sortable="true"
								class="red"
								style="width: 15.44943820224719%;"><a
									href="#"
									class="datatable-sorter">
									<div class="flex items-center gap-1.5">
										<p>Address</p>
										<div class="inline-flex flex-col space-y-[2px]">
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 0L0 5H10L5 0Z"
														fill=""></path>
												</svg>
											</span>
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
														fill=""></path>
												</svg>
											</span>
										</div>
									</div>
								</a></th>
							<th
								data-sortable="true"
								style="width: 16.760299625468164%;"><a
									href="#"
									class="datatable-sorter">
									<div class="flex items-center gap-1.5">
										<p>Status</p>
										<div class="inline-flex flex-col space-y-[2px]">
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 0L0 5H10L5 0Z"
														fill=""></path>
												</svg>
											</span>
											<span class="inline-block">
												<svg
													class="fill-current"
													width="10"
													height="5"
													viewBox="0 0 10 5"
													fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z"
														fill=""></path>
												</svg>
											</span>
										</div>
									</div>
								</a></th>
						</tr>
						<tr>
							<th><input
									class="datatable-input"
									type="search"
								></th>
							<th><input
									class="datatable-input"
									type="search"
									name="OrderSearch[phenenum]"></th>
							<th><></th>
						</tr>
						</thead>
						<tbody>
						<tr data-index="0">
							<td>Andrio Maksim</td>
							<td>Designer</td>
							<td>25 Nov, 1989</td>
							<td>maksim45@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Full-time</td>
						</tr>
						<tr data-index="1">
							<td>Brielle Kuphal</td>
							<td>Developer</td>
							<td>25 Nov, 1977</td>
							<td>Brielle45@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Full-time</td>
						</tr>
						<tr data-index="2">
							<td>Barney Murray</td>
							<td>Designer</td>
							<td>25 Nov, 1966</td>
							<td>Barney@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Part-time</td>
						</tr>
						<tr data-index="3">
							<td>Ressie Ruecker</td>
							<td>Designer</td>
							<td>25 Nov, 1955</td>
							<td>Ressie@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Full-time</td>
						</tr>
						<tr data-index="4">
							<td>Teresa Mertz</td>
							<td>Designer</td>
							<td>25 Nov, 1979</td>
							<td>Teresa@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Part-time</td>
						</tr>
						<tr data-index="5">
							<td>Chelsey Hackett</td>
							<td>Designer</td>
							<td>25 Nov, 1969</td>
							<td>Chelsey@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Full-time</td>
						</tr>
						<tr data-index="6">
							<td>Tatyana Metz</td>
							<td>Designer</td>
							<td>25 Nov, 1989</td>
							<td>Tatyana@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Part-time</td>
						</tr>
						<tr data-index="7">
							<td>Oleta Harvey</td>
							<td>Designer</td>
							<td>25 Nov, 1979</td>
							<td>Oleta@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Full-time</td>
						</tr>
						<tr data-index="8">
							<td>Bette Haag</td>
							<td>Designer</td>
							<td>25 Nov, 1979</td>
							<td>Bette@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Part-time</td>
						</tr>
						<tr data-index="9">
							<td>Meda Ebert</td>
							<td>Designer</td>
							<td>25 Nov, 1945</td>
							<td>Meda@gmail.com</td>
							<td class="green">Block A, Demo Park</td>
							<td>Full-time</td>
						</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>


	</div>
</div>
