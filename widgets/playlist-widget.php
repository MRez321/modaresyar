<?php

class Elementor_playlist_Widget extends \Elementor\Widget_Base {
    	public function get_name() {
		return 'Bplaylist';
	}
    public function get_title() {
		return esc_html__( 'مدرس یار 1', 'elementor-bplaylist-widget' );
	}
	public function get_icon() {
		return 'eicon-thumbnails-right';
	}
	public function get_categories() {
		return [ 'modaresyar-elements' ];
	}
	public function get_keywords() {
		return [ 'video', 'playlist', 'bahareman' ];
	}
	
	
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'bVideo playlist', 'elementor-bplaylist-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
	);
	$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'text',
			[
				'label' => esc_html__( 'عنوان', 'elementor-list-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'عنوان درس', 'elementor-list-widget' ),
				'default' => esc_html__( 'List Item', 'elementor-list-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		
		$repeater->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'زیرعنوان', 'elementor-list-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( '', 'elementor-list-widget' ),
				'default' => esc_html__( '', 'elementor-list-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		

		$repeater->add_control(
			'link',
			[
				'label' => esc_html__( 'لینک', 'elementor-list-widget' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'course_description',
			[
				'label' => esc_html__( 'توضیحات', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
			]
		);
		


		/* End repeater */
		$this->add_control(
			'cover_image',
			[
				'label' => esc_html__( 'تصویر کاور', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'widget_title',
			[
				'label' => esc_html__( 'عنوان', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'سرفصل‌های دوره', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);

		$this->add_control(
			'list_items',
			[
				'label' => esc_html__( 'لیست دروس', 'elementor-list-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),   
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'elementor-list-widget' ),
						'link' => '',
					],
					[
						'text' => esc_html__( 'List Item #2', 'elementor-list-widget' ),
						'link' => '',
					],
					[
						'text' => esc_html__( 'List Item #3', 'elementor-list-widget' ),
						'link' => '',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bpbg_color',
			[
				'label' => esc_html__( 'رنگ پس زمینه', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modrsyar-playlist' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'رنگ عنوان', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bplist-title' => 'color: {{VALUE}}',
				],
			]
		);
			$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .bplist>.bplist-title',
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'items_bgc',
			[
				'label' => esc_html__( 'پس زمینه دروس', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bplist ul li' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'items_color',
			[
				'label' => esc_html__( 'رنگ متن دروس', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bplist ul li' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'items_font_family',
			[
				'label' => esc_html__( 'فونت دروس', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .bplist ul li' => 'font-family: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'items_color_secound',
			[
				'label' => esc_html__( 'رنگ متن زیر عنوان', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bptitle-wrapper>span:first-child' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'selected_color',
			[
				'label' => esc_html__( 'پس زمینه درحال پخش', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} li.bplist-active' => 'background: {{VALUE}} !important',
				],
			]
		);
		$this->end_controls_section();
	}
	
private function user_owns_product( $user_id, $product_id ) {
    // Get all completed orders for the user
    $orders = wc_get_orders( array(
        'customer_id' => $user_id,
        'limit' => -1,
        'status' => array( 'completed' )
    ) );

    // Loop through each order to check if the product exists
    foreach ( $orders as $order ) {
        foreach ( $order->get_items() as $item ) {
            if ( $item->get_product_id() == $product_id ) {
                return true; // Product found, user owns it
            }
        }
    }
}

protected function render() {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        $product_id = get_the_ID();
		$phone_number = get_user_meta($current_user->ID, 'phone_number', true);
		if (empty($phone_number)) {
			$phone_number = $current_user->user_nicename;
		}


        if ( $this->user_owns_product( $current_user->ID, $product_id ) || current_user_can('administrator') ) {
            $settings = $this->get_settings_for_display();
            $first_video_url = !empty($settings['list_items']) ? $settings['list_items'][0]['link']['url'] : '';
            $video_poster = !empty($settings['cover_image']) ? $settings['cover_image'] : '';
            $bpwidget_title = !empty($settings['widget_title']) ? $settings['widget_title'] : '';
            $section_id = 'modrsyar-playlist-' . uniqid();
            $video_section_id = 'mds-video-' . uniqid();
            ?>

            <section id="<?php echo esc_attr($section_id); ?>" class="modrsyar-playlist">
                <div class="bwrapper">
                    <video id="<?php echo esc_attr($video_section_id); ?>" class="video-js bPlayer-video" poster="<?php echo esc_url($video_poster['url']); ?>" src="" controls oncontextmenu="return false;" controlsList="nodownload" data-setup='{"prelode":"auto","pictureInPictureToggle": false,"playbackRates": [0.5, 1.0, 1.5, 2]}'></video>
                </div>
                <div class="bplist">
					<div class="bPlayer-controls">
						<button class="bPlayer-next" type="button" data-state="next"></button>
						<button class="bPlayer-forward" type="button" data-state="forward"></button>
						<button class="bPlayer-playpause" type="button" data-state="play"></button>
						<button class="bPlayer-backward" type="button" data-state="backward"></button>
						<button class="bPlayer-previous" type="button" data-state="previous"></button>
					</div>

					<div class="modaresyar-desc-wrapper">
						<span class="modaresyar-notif-wrapper">
							<button class="modaresyar-notif" type="button" data-state="unseen" style="display: none;"></button>
						</span>
						<div class="modaresyar-lessen-desc"></div>
					</div>

                    <h3 class="bplist-title">
                        <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                        <?php echo esc_html($bpwidget_title); ?>
                        <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                    </h3>
                    <ul>
                        <?php foreach ($settings['list_items'] as $index => $item) : ?>
                            <li data-src="<?php echo esc_attr(base64_encode($item['link']['url'])); ?>">
                                <span>
                                   <i class="fa fa-video-camera"></i>
                                   <img class="bplist-coruse-image" src="<?php echo esc_url(get_the_post_thumbnail_url($product_id)); ?>" alt="<?php echo esc_attr($item['subtitle']); ?>">
                                </span>
								<div class="modaresyar-course-desc" style="display:none;"><?php echo $item['course_description']; ?></div>
                                <div class="bptitle-wrapper">
                                    <span><?php echo esc_html($item['subtitle']); ?></span>
                                    <span><?php echo esc_html($item['text']); ?></span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
			
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const Bpsection = document.getElementById('<?php echo esc_js($section_id); ?>');
                    const BpVideoSection = document.getElementById('<?php echo esc_js($video_section_id); ?>');
					const MdsUsersData = "<?php echo esc_js($phone_number); ?>";
					const MdsLessenData = document.querySelector(`#${Bpsection.id} .modaresyar-lessen-desc`);


                    if (Bpsection) {
						const player = videojs(BpVideoSection.id);
						// console.log('el => ',player.el());
						
						player.ready(function() {
							console.log('Ready');

							let watermark = document.createElement('div');
							watermark.classList.add('vjs-watermark');
							watermark.classList.add('modaresyar-wm');
							watermark.innerText = MdsUsersData;
							player.el().appendChild(watermark);
						});

						player.on('fullscreenchange', function () {
							const watermark = document.querySelector('.vjs-watermark');
							if (player.isFullscreen()) {
								watermark.style.fontSize = '2.5rem';
							} else {
								watermark.style.fontSize = '1.5rem';
							}
						});
						
                        const videoElement = document.querySelector(`#${Bpsection.id} .bwrapper video`);
                        const playlistItems = document.querySelectorAll(`#${Bpsection.id} .bplist li`);

                        if (playlistItems.length > 0) {
                            playlistItems[0].classList.add('bplist-active');
                            playlistItems[0].querySelector('i').classList.add('bplist-active');

							const encodedSrc = playlistItems[0].getAttribute('data-src');
							const videoSrc = atob(encodedSrc);
							fetchVideoInChunks(videoElement, videoSrc)
                        }

                        if (playlistItems.length > 5) {
                            const ul = document.querySelector(`#${Bpsection.id} .bplist > ul`);
                            ul.style.overflowY = 'scroll';
                        }

						const mdsNotifWrapper = document.querySelector(`#${Bpsection.id} .modaresyar-notif-wrapper`);
						const mdsNotif = document.querySelector(`#${Bpsection.id} .modaresyar-notif`);

						mdsNotif.addEventListener('click', () => {
							mdsNotif.setAttribute('data-state', 'seen');
							MdsLessenData.classList.toggle('display-mds-desc');
						});

                        playlistItems.forEach((item) => {
                            item.addEventListener('click', function() {
                                playlistItems.forEach((li) => {
									li.classList.remove('bplist-active');
                                    li.querySelector('i').classList.remove('bplist-active');
                                });

								const MdscourseData = item.querySelector('.modaresyar-course-desc').innerHTML;
								MdsLessenData.innerHTML = MdscourseData;
								
								if (MdscourseData.trim() !== "") {
									mdsNotif.style.display = 'block';
									mdsNotifWrapper.classList.add('modaresyar-notif-visible');
								} else {
									mdsNotif.style.display = 'none';
									mdsNotifWrapper.classList.remove('modaresyar-notif-visible');
									
									const lessonDesc = document.querySelector(`#${Bpsection.id} .bplist .modaresyar-lessen-desc`);
									lessonDesc.classList.remove('display-mds-desc');
								}

                                item.classList.add('bplist-active');
                                item.querySelector('i').classList.add('bplist-active');


                                const encodedSrc = this.getAttribute('data-src');
                                const videoSrc = atob(encodedSrc);
						
								// videoElement.src = videoSrc;
								videoElement.play();

								fetchVideoInChunks(videoElement, videoSrc);
                            });


                        });


						async function fetchVideoInChunks(video, videoURL) {
							let chunkSize = 6000000; // Size for each video chunk
							let currentByte = 0;     // Start byte for the next chunk
							let videoData = [];      // Array to hold the fetched chunks
							let totalSize = null;    // Total size of the video
							let isBuffering = false; // To prevent multiple fetch requests
							let isPaused = false;    // Keep track of whether the video is paused
							let isWaitingForChunk = false; // Keep track of whether the user is waiting for a chunk

							// Function to fetch video chunk by range
							async function fetchVideoChunk(url, start, end) {
								const response = await fetch(url, {
									headers: {
										'Range': `bytes=${start}-${end}`,
									},
								});

								if (!response.ok) {
									throw new Error(`HTTP error! status: ${response.status}`);
								}

								// Determine the total size from the Content-Range header
								if (!totalSize) {
									const contentRange = response.headers.get('Content-Range');
									if (contentRange) {
										totalSize = parseInt(contentRange.split('/')[1], 10);
									}
								}

								return await response.arrayBuffer();
							}

							// Function to append the next chunk of video
							async function appendNextChunk() {
								if (isBuffering || (totalSize && currentByte >= totalSize)) return;

								isBuffering = true;

								// Fetch the next chunk
								const videoChunk = await fetchVideoChunk(videoURL, currentByte, currentByte + chunkSize - 1);
								currentByte += chunkSize;

								// Append this chunk to the video data array
								videoData.push(videoChunk);

								// Create a Blob from the video data
								const videoBlob = new Blob(videoData, { type: 'video/mp4' });
								const nextBlobURL = URL.createObjectURL(videoBlob);

								// Save the current time, set the new Blob as the video source, and restore the current time
								const currentTime = video.currentTime;
								video.src = nextBlobURL;
								video.currentTime = currentTime;

								isBuffering = false;

								// If the user was waiting for a chunk to play, start playing now
								if (isWaitingForChunk) {
									video.play();
									isWaitingForChunk = false;
								}
							}

							// Preload the first two chunks
							const firstChunk = await fetchVideoChunk(videoURL, currentByte, currentByte + chunkSize - 1);
							currentByte += chunkSize;
							videoData.push(firstChunk);

							const secondChunk = await fetchVideoChunk(videoURL, currentByte, currentByte + chunkSize - 1);
							currentByte += chunkSize;
							videoData.push(secondChunk);

							// Create a Blob for the first two chunks
							const firstBlob = new Blob(videoData, { type: 'video/mp4' });
							const firstBlobURL = URL.createObjectURL(firstBlob);
							video.src = firstBlobURL;

							// Monitor buffer and load more chunks as needed
							video.addEventListener('timeupdate', () => {
								const bufferedEnd = video.buffered.length > 0 ? video.buffered.end(0) : 0;
								const currentTime = video.currentTime;

								// Load the next chunk when close to the end of the buffered content
								if (bufferedEnd - currentTime < 5 && currentByte < totalSize) {
									appendNextChunk();
								}
							});

							// Handle play event to start fetching new chunks when video plays
							video.addEventListener('play', () => {
								isPaused = false;

								// If the video is buffering and a chunk isn't ready yet, set it to autoplay when ready
								if (isBuffering) {
									isWaitingForChunk = true;
								}
							});

							// Handle pause event to prevent autoplay when fetching new chunks
							video.addEventListener('pause', () => {
								isPaused = true;
								isWaitingForChunk = false; // Reset waiting flag when paused
							});

							// Ensure video does not start playing automatically when new chunks are ready if paused
							video.addEventListener('timeupdate', () => {
								if (isPaused && video.paused) {
									video.pause();
								}
							});

							// Handle when the video ends
							video.addEventListener('ended', () => {
								console.log('Video playback ended.');
							});
						}






















						const firstItemContent = playlistItems[0].querySelector('.modaresyar-course-desc').innerHTML;
						if (firstItemContent.trim() !== "") {
							mdsNotif.style.display = 'block';
							mdsNotifWrapper.classList.add('modaresyar-notif-visible');
							MdsLessenData.innerHTML = firstItemContent;
						}
					

						const playPauseBtn = document.querySelector(`#${Bpsection.id} .bPlayer-playpause`);
						const backwardBtn = document.querySelector(`#${Bpsection.id} .bPlayer-backward`);
						const forwardBtn = document.querySelector(`#${Bpsection.id} .bPlayer-forward`);
						const nextBtn = document.querySelector(`#${Bpsection.id} .bPlayer-next`);
						const previousBtn = document.querySelector(`#${Bpsection.id} .bPlayer-previous`);
						
						
						nextBtn.addEventListener('click', changeVideoTrack);
						previousBtn.addEventListener('click', changeVideoTrack);
						
						function changeVideoTrack (e) {
							const activeItem = document.querySelector(`#${Bpsection.id} li.bplist-active`);
							const next = activeItem.nextElementSibling;
							const prev = activeItem.previousElementSibling;
							const target = e.target.dataset.state;

							if (target === 'next') {
								if (next) {
									next.click();
								}
							}
							if (target === 'previous') {
								if (prev) {
									prev.click();
								}
							}
						}

						playPauseBtn.addEventListener('click', function() {
							if (player.paused()) {
								player.play();
								playPauseBtn.setAttribute('data-state', 'pause');
							} else {
								player.pause();
								playPauseBtn.setAttribute('data-state', 'play');
							}
						});

						backwardBtn.addEventListener('click', function() {
							player.currentTime(player.currentTime() - 10);
						});

						forwardBtn.addEventListener('click', function() {
							player.currentTime(player.currentTime() + 10);
						});


						player.on('play', function() {
							playPauseBtn.setAttribute('data-state', 'pause');
							startWatermarkPositioning();
						});

						player.on('pause', function() {
							playPauseBtn.setAttribute('data-state', 'play');
							stopWatermarkPositioning();
						});
                    }


					function getRandomInt(min, max) {
						return Math.floor(Math.random() * (max - min + 1)) + min;
					}

					function placeWatermark() {
						const watermark = document.querySelector(`#${Bpsection.id} .modaresyar-wm`);
						const video = document.querySelector(`#${Bpsection.id} #${BpVideoSection.id}`);

						if (!watermark || !video) {
							console.error('Required elements not found.');
							return;
						}

						const videoRect = video.getBoundingClientRect();
						const watermarkRect = watermark.getBoundingClientRect();

						const maxX = videoRect.width - watermarkRect.width;
						const maxY = videoRect.height - watermarkRect.height;
						
						const randomX = getRandomInt(0, maxX);
						const randomY = getRandomInt(0, maxY);
						
						watermark.style.position = 'absolute';
						watermark.style.left = `${randomX}px`;
						watermark.style.top = `${randomY}px`;
					}

					let wtInterval = null;
					function startWatermarkPositioning() {
						placeWatermark();
						wtInterval = setInterval(placeWatermark, getRandomInt(15000, 20000));
					}
					function stopWatermarkPositioning() {
						clearInterval(wtInterval);
						wtInterval = null;
					}

                });

            </script>
            <?php
        } 
    } else {
        echo '<p class="modrsyar-playlist" style="text-align:center;color:white;"> برای مشاهده، دوره را تهیه نمایید </p>';
    }
}



}