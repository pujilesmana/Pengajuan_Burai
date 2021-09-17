<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{


	public function Create_pengajuan()
	{
		$post = $this->input->post();
		$foto = array();
		$kategori = $post['kategori'];
		$nama = $post['nama'];
		$nik = $post['nik'];

		$config['upload_path']          = './assets/dashboard/image/uploads/';
		$config['allowed_types']        = 'jpg|jpeg|bmp|png';
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if ($kategori == "Surat Keterangan Tidak Mampu") {

			if (!empty($_FILES['ktpSKTM']['name']) && !empty($_FILES['rumahSKTM']['name'])) {

				if ($_FILES['ktpSKTM']['type'] == "image/jpeg" || $_FILES['ktpSKTM']['type'] == "image/png" || $_FILES['ktpSKTM']['type'] == "image/bmp" || $_FILES['ktpSKTM']['type'] == "image/jpg") {
					if ($_FILES['rumahSKTM']['type'] == "image/jpeg" || $_FILES['rumahSKTM']['type'] == "image/png" || $_FILES['rumahSKTM']['type'] == "image/bmp" || $_FILES['rumahSKTM']['type'] == "image/jpg") {
						if ($this->upload->do_upload('ktpSKTM')) {

							$uploadData = $this->upload->data();
							$gambarKTP = $uploadData['file_name'];

							if ($this->upload->do_upload('rumahSKTM')) {

								$uploadData = $this->upload->data();
								$gambarrumah = $uploadData['file_name'];

								$foto = array(
									'ktp' => $gambarKTP,
									'rumah' => $gambarrumah
								);

								$jsonFile = json_encode($foto);

								$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
								echo 1;
							}
						}
					} else {
						echo 6;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}
		//Surat Keterangan Tidak Terdaftar Jaminan Sosial
		elseif ($kategori == "Surat Keterangan Tidak Terdaftar Jaminan Sosial") {

			if (!empty($_FILES['ktpSKJ']['name'])) {

				if ($_FILES['ktpSKJ']['type'] == "image/jpeg" || $_FILES['ktpSKJ']['type'] == "image/png" || $_FILES['ktpSKJ']['type'] == "image/bmp" || $_FILES['ktpSKJ']['type'] == "image/jpg") {
					if ($this->upload->do_upload('ktpSKJ')) {

						$uploadData = $this->upload->data();
						$gambarKTP = $uploadData['file_name'];
						$foto = array(
							'ktp' => $gambarKTP,
						);
						$jsonFile = json_encode($foto);

						$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
						echo 1;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Surat Keterangan Domisili
		elseif ($kategori == "Surat Domisili") {
			if (!empty($_FILES['ktpD']['name']) && !empty($_FILES['kkD']['name'])) {

				if ($_FILES['ktpD']['type'] == "image/jpeg" || $_FILES['ktpD']['type'] == "image/png" || $_FILES['ktpD']['type'] == "image/bmp" || $_FILES['ktpD']['type'] == "image/jpg") {
					if ($_FILES['kkD']['type'] == "image/jpeg" || $_FILES['kkD']['type'] == "image/png" || $_FILES['kkD']['type'] == "image/bmp" || $_FILES['kkD']['type'] == "image/jpg") {
						if ($this->upload->do_upload('ktpD')) {

							$uploadData = $this->upload->data();
							$gambarKTP = $uploadData['file_name'];

							if ($this->upload->do_upload('kkD')) {

								$uploadData = $this->upload->data();
								$gambarkk = $uploadData['file_name'];
								$foto = array(
									'ktp' => $gambarKTP,
									'kk' => $gambarkk
								);

								$jsonFile = json_encode($foto);

								$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
								echo 1;
							}
						}
					} else {
						echo 6;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Surat Keterangan Usaha
		elseif ($kategori == "Surat Keterangan Usaha") {
			if (!empty($_FILES['ktpSKU']['name']) && !empty($_FILES['kkSKU']['name']) && !empty($_FILES['UsahaSKU']['name'])) {

				if ($_FILES['ktpSKU']['type'] == "image/jpeg" || $_FILES['ktpSKU']['type'] == "image/png" || $_FILES['ktpSKU']['type'] == "image/bmp" || $_FILES['ktpSKU']['type'] == "image/jpg") {
					if ($_FILES['kkSKU']['type'] == "image/jpeg" || $_FILES['kkSKU']['type'] == "image/png" || $_FILES['kkSKU']['type'] == "image/bmp" || $_FILES['kkSKU']['type'] == "image/jpg") {
						if ($_FILES['UsahaSKU']['type'] == "image/jpeg" || $_FILES['UsahaSKU']['type'] == "image/png" || $_FILES['UsahaSKU']['type'] == "image/bmp" || $_FILES['UsahaSKU']['type'] == "image/jpg") {
							if ($this->upload->do_upload('ktpSKU')) {

								$uploadData = $this->upload->data();
								$gambarKTP = $uploadData['file_name'];;

								if ($this->upload->do_upload('kkSKU')) {

									$uploadData = $this->upload->data();
									$gambarkk = $uploadData['file_name'];

									if ($this->upload->do_upload('UsahaSKU')) {
										$uploadData = $this->upload->data();
										$gambarusaha = $uploadData['file_name'];
										$foto = array(
											'ktp' => $gambarKTP,
											'kk' => $gambarkk,
											'usaha' => $gambarusaha
										);

										$jsonFile = json_encode($foto);

										$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
										echo 1;
									}
								}
							}
						} else {
							echo 5;
						}
					} else {
						echo 5;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		// Surat Keterangan Meninggal Dunia
		elseif ($kategori == "Surat Keterangan Meninggal Dunia") {

			$hari_kematian = $post['hari_kematian'];
			$t = explode("-", $post['tanggal_kematian']);
			$filter_tanggal = $t[2] . "-" . $t[1] . "-" . $t[0];

			$filterHT = $hari_kematian . "," . $filter_tanggal;

			if (!empty($_FILES['ktpSKMD']['name'])) {

				if ($_FILES['ktpSKMD']['type'] == "image/jpeg" || $_FILES['ktpSKMD']['type'] == "image/png" || $_FILES['ktpSKMD']['type'] == "image/bmp" || $_FILES['ktpSKMD']['type'] == "image/jpg") {
					if ($this->upload->do_upload('ktpSKMD')) {

						$uploadData = $this->upload->data();
						$gambarKTP = $uploadData['file_name'];
						$foto = array(
							'ktp' => $gambarKTP,
							'tanggal_hari_kematian' => $filterHT
						);
						$jsonFile = json_encode($foto);

						$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
						echo 1;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Surat Keterangan Beda Identitas
		elseif ($kategori == "Surat Keterangan Beda Identitas") {
			if (!empty($_FILES['ktpSKBI']['name']) && !empty($_FILES['kkSKBI']['name']) && !empty($_FILES['IjazahSKBI']['name'])) {

				if ($_FILES['ktpSKBI']['type'] == "image/jpeg" || $_FILES['ktpSKBI']['type'] == "image/png" || $_FILES['ktpSKBI']['type'] == "image/bmp" || $_FILES['ktpSKBI']['type'] == "image/jpg") {
					if ($_FILES['kkSKBI']['type'] == "image/jpeg" || $_FILES['kkSKBI']['type'] == "image/png" || $_FILES['kkSKBI']['type'] == "image/bmp" || $_FILES['kkSKBI']['type'] == "image/jpg") {
						if ($_FILES['IjazahSKBI']['type'] == "image/jpeg" || $_FILES['IjazahSKBI']['type'] == "image/png" || $_FILES['IjazahSKBI']['type'] == "image/bmp" || $_FILES['IjazahSKBI']['type'] == "image/jpg") {
							if ($this->upload->do_upload('ktpSKBI')) {

								$uploadData = $this->upload->data();
								$gambarKTP = $uploadData['file_name'];;

								if ($this->upload->do_upload('kkSKBI')) {

									$uploadData = $this->upload->data();
									$gambarkk = $uploadData['file_name'];

									if ($this->upload->do_upload('IjazahSKBI')) {
										$uploadData = $this->upload->data();
										$gambarijazah = $uploadData['file_name'];
										$foto = array(
											'ktp' => $gambarKTP,
											'kk' => $gambarkk,
											'ijazah' => $gambarijazah
										);

										$jsonFile = json_encode($foto);

										$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
										echo 1;
									}
								}
							}
						} else {
							echo 5;
						}
					} else {
						echo 5;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Surat Pengantar Perkawinan
		elseif ($kategori == "Surat Pengantar Perkawinan") {
			if (!empty($_FILES['ktpclSPP']['name']) && !empty($_FILES['kkcpSPP']['name']) && !empty($_FILES['kkotclSPP']['name']) && !empty($_FILES['kkotcpSPP']['name'])) {

				if ($_FILES['ktpclSPP']['type'] == "image/jpeg" || $_FILES['ktpclSPP']['type'] == "image/png" || $_FILES['ktpclSPP']['type'] == "image/bmp" || $_FILES['ktpclSPP']['type'] == "image/jpg") {
					if ($_FILES['kkcpSPP']['type'] == "image/jpeg" || $_FILES['kkcpSPP']['type'] == "image/png" || $_FILES['kkcpSPP']['type'] == "image/bmp" || $_FILES['kkcpSPP']['type'] == "image/jpg") {
						if ($_FILES['kkotclSPP']['type'] == "image/jpeg" || $_FILES['kkotclSPP']['type'] == "image/png" || $_FILES['kkotclSPP']['type'] == "image/bmp" || $_FILES['kkotclSPP']['type'] == "image/jpg") {
							if ($_FILES['kkotcpSPP']['type'] == "image/jpeg" || $_FILES['kkotcpSPP']['type'] == "image/png" || $_FILES['kkotcpSPP']['type'] == "image/bmp" || $_FILES['kkotcpSPP']['type'] == "image/jpg") {
								if ($this->upload->do_upload('ktpclSPP')) {

									$uploadData = $this->upload->data();
									$gambarKTP = $uploadData['file_name'];;

									if ($this->upload->do_upload('kkcpSPP')) {

										$uploadData = $this->upload->data();
										$gambarkk = $uploadData['file_name'];

										if ($this->upload->do_upload('kkotclSPP')) {

											$uploadData = $this->upload->data();
											$gambarikkotcl = $uploadData['file_name'];

											if ($this->upload->do_upload('kkotcpSPP')) {

												$uploadData = $this->upload->data();
												$gambarikkotcp = $uploadData['file_name'];
												$foto = array(
													'ktp' => $gambarKTP,
													'kk' => $gambarkk,
													'kkotcl' => $gambarikkotcl,
													'kkotcp' => $gambarikkotcp,
												);

												$jsonFile = json_encode($foto);

												$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
												echo 1;
											}
										}
									}
								}
							} else {
								echo 5;
							}
						} else {
							echo 5;
						}
					} else {
						echo 5;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Surat Keterangan Penghasilan
		elseif ($kategori == "Surat Keterangan Penghasilan") {
			$jmlhkotor = $post['jmlhkotor'];
			if (!empty($_FILES['ktpSKP']['name']) && !empty($_FILES['ktpbsSKP']['name']) && !empty($_FILES['kkSKP']['name'])) {

				if ($_FILES['ktpSKP']['type'] == "image/jpeg" || $_FILES['ktpSKP']['type'] == "image/png" || $_FILES['ktpSKP']['type'] == "image/bmp" || $_FILES['ktpSKP']['type'] == "image/jpg") {
					if ($_FILES['ktpbsSKP']['type'] == "image/jpeg" || $_FILES['ktpbsSKP']['type'] == "image/png" || $_FILES['ktpbsSKP']['type'] == "image/bmp" || $_FILES['ktpbsSKP']['type'] == "image/jpg") {
						if ($_FILES['kkSKP']['type'] == "image/jpeg" || $_FILES['kkSKP']['type'] == "image/png" || $_FILES['kkSKP']['type'] == "image/bmp" || $_FILES['kkSKP']['type'] == "image/jpg") {
							if ($this->upload->do_upload('ktpSKP')) {

								$uploadData = $this->upload->data();
								$gambarKTP = $uploadData['file_name'];;

								if ($this->upload->do_upload('ktpbsSKP')) {

									$uploadData = $this->upload->data();
									$gambarktpbs = $uploadData['file_name'];

									if ($this->upload->do_upload('kkSKP')) {
										$uploadData = $this->upload->data();
										$gambarkk = $uploadData['file_name'];
										$foto = array(
											'ktp' => $gambarKTP,
											'kktbs' => $gambarktpbs,
											'kk' => $gambarkk,
											'jmlhpenghasilankotor' => $jmlhkotor,
										);

										$jsonFile = json_encode($foto);

										$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
										echo 1;
									}
								}
							}
						} else {
							echo 5;
						}
					} else {
						echo 5;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Surat Pengantar Perkawinan
		elseif ($kategori == "Surat Tanah Pengakuan Hak dan Surat Keterangan Tanah") {
			if (!empty($_FILES['ktpSTPHSKT']['name']) && !empty($_FILES['kkSTPHSKT']['name']) && !empty($_FILES['suratpermohonanKD']['name']) && !empty($_FILES['suratpermohonanKC']['name'])  && !empty($_FILES['suratjualbeli']['name'])) {

				if ($_FILES['ktpSTPHSKT']['type'] == "image/jpeg" || $_FILES['ktpSTPHSKT']['type'] == "image/png" || $_FILES['ktpSTPHSKT']['type'] == "image/bmp" || $_FILES['ktpSTPHSKT']['type'] == "image/jpg") {
					if ($_FILES['kkSTPHSKT']['type'] == "image/jpeg" || $_FILES['kkSTPHSKT']['type'] == "image/png" || $_FILES['kkSTPHSKT']['type'] == "image/bmp" || $_FILES['kkSTPHSKT']['type'] == "image/jpg") {
						if ($_FILES['suratpermohonanKD']['type'] == "image/jpeg" || $_FILES['suratpermohonanKD']['type'] == "image/png" || $_FILES['suratpermohonanKD']['type'] == "image/bmp" || $_FILES['suratpermohonanKD']['type'] == "image/jpg") {
							if ($_FILES['suratpermohonanKC']['type'] == "image/jpeg" || $_FILES['suratpermohonanKC']['type'] == "image/png" || $_FILES['suratpermohonanKC']['type'] == "image/bmp" || $_FILES['suratpermohonanKC']['type'] == "image/jpg") {
								if ($_FILES['suratjualbeli']['type'] == "image/jpeg" || $_FILES['suratjualbeli']['type'] == "image/png" || $_FILES['suratjualbeli']['type'] == "image/bmp" || $_FILES['suratjualbeli']['type'] == "image/jpg") {
									if ($this->upload->do_upload('ktpSTPHSKT')) {

										$uploadData = $this->upload->data();
										$gambarKTP = $uploadData['file_name'];;

										if ($this->upload->do_upload('kkSTPHSKT')) {

											$uploadData = $this->upload->data();
											$gambarkk = $uploadData['file_name'];

											if ($this->upload->do_upload('suratpermohonanKD')) {

												$uploadData = $this->upload->data();
												$suratpermohonanKD = $uploadData['file_name'];

												if ($this->upload->do_upload('suratpermohonanKC')) {

													$uploadData = $this->upload->data();
													$suratpermohonanKC = $uploadData['file_name'];

													if ($this->upload->do_upload('suratjualbeli')) {

														$uploadData = $this->upload->data();
														$suratjualbeli = $uploadData['file_name'];
														$foto = array(
															'ktp' => $gambarKTP,
															'kk' => $gambarkk,
															'suratpermohonanKD' => $suratpermohonanKD,
															'suratpermohonanKC' => $suratpermohonanKC,
															'suratjualbeli' => $suratjualbeli,
														);

														$jsonFile = json_encode($foto);

														$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
														echo 1;
													}
												}
											}
										}
									}
								} else {
									echo 5;
								}
							} else {
								echo 5;
							}
						} else {
							echo 5;
						}
					} else {
						echo 5;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Akte Kelahiran dan KK
		elseif ($kategori == "Akta kelahiran dan KK") {
			if (!empty($_FILES['ktpayah']['name']) && !empty($_FILES['ktpibu']['name']) && !empty($_FILES['bukunikah']['name']) && !empty($_FILES['suratketeranganlahiranak']['name'])  && !empty($_FILES['f107']['name']) && !empty($_FILES['f105']['name']) && !empty($_FILES['f201']['name']) && !empty($_FILES['f203']['name']) && !empty($_FILES['f204']['name'])) {

				if ($_FILES['ktpayah']['type'] == "image/jpeg" || $_FILES['ktpayah']['type'] == "image/png" || $_FILES['ktpayah']['type'] == "image/bmp" || $_FILES['ktpayah']['type'] == "image/jpg") {
					if ($_FILES['ktpibu']['type'] == "image/jpeg" || $_FILES['ktpibu']['type'] == "image/png" || $_FILES['ktpibu']['type'] == "image/bmp" || $_FILES['ktpibu']['type'] == "image/jpg") {
						if ($_FILES['bukunikah']['type'] == "image/jpeg" || $_FILES['bukunikah']['type'] == "image/png" || $_FILES['bukunikah']['type'] == "image/bmp" || $_FILES['bukunikah']['type'] == "image/jpg") {
							if ($_FILES['suratketeranganlahiranak']['type'] == "image/jpeg" || $_FILES['suratketeranganlahiranak']['type'] == "image/png" || $_FILES['suratketeranganlahiranak']['type'] == "image/bmp" || $_FILES['suratketeranganlahiranak']['type'] == "image/jpg") {
								if ($_FILES['f107']['type'] == "image/jpeg" || $_FILES['f107']['type'] == "image/png" || $_FILES['f107']['type'] == "image/bmp" || $_FILES['f107']['type'] == "image/jpg") {
									if ($_FILES['f105']['type'] == "image/jpeg" || $_FILES['f105']['type'] == "image/png" || $_FILES['f105']['type'] == "image/bmp" || $_FILES['f105']['type'] == "image/jpg") {
										if ($_FILES['f201']['type'] == "image/jpeg" || $_FILES['f201']['type'] == "image/png" || $_FILES['f201']['type'] == "image/bmp" || $_FILES['f201']['type'] == "image/jpg") {
											if ($_FILES['f203']['type'] == "image/jpeg" || $_FILES['f203']['type'] == "image/png" || $_FILES['f203']['type'] == "image/bmp" || $_FILES['f203']['type'] == "image/jpg") {
												if ($_FILES['f204']['type'] == "image/jpeg" || $_FILES['f204']['type'] == "image/png" || $_FILES['f204']['type'] == "image/bmp" || $_FILES['f204']['type'] == "image/jpg") {
													if ($this->upload->do_upload('ktpayah')) {

														$uploadData = $this->upload->data();
														$ktpayah = $uploadData['file_name'];;

														if ($this->upload->do_upload('ktpibu')) {

															$uploadData = $this->upload->data();
															$ktpibu = $uploadData['file_name'];

															if ($this->upload->do_upload('bukunikah')) {

																$uploadData = $this->upload->data();
																$bukunikah = $uploadData['file_name'];

																if ($this->upload->do_upload('suratketeranganlahiranak')) {

																	$uploadData = $this->upload->data();
																	$suratketeranganlahiranak = $uploadData['file_name'];

																	if ($this->upload->do_upload('f107')) {

																		$uploadData = $this->upload->data();
																		$f107 = $uploadData['file_name'];

																		if ($this->upload->do_upload('f105')) {

																			$uploadData = $this->upload->data();
																			$f105 = $uploadData['file_name'];

																			if ($this->upload->do_upload('f201')) {

																				$uploadData = $this->upload->data();
																				$f201 = $uploadData['file_name'];

																				if ($this->upload->do_upload('f203')) {

																					$uploadData = $this->upload->data();
																					$f203 = $uploadData['file_name'];

																					if ($this->upload->do_upload('f204')) {

																						$uploadData = $this->upload->data();
																						$f204 = $uploadData['file_name'];

																						$foto = array(
																							'ktpayah' => $ktpayah,
																							'ktpibu' => $ktpibu,
																							'bukunikah' => $bukunikah,
																							'suratketeranganlahiranak' => $suratketeranganlahiranak,
																							'f107' => $f107,
																							'f105' => $f105,
																							'f201' => $f201,
																							'f203' => $f203,
																							'f204' => $f204,
																						);

																						$jsonFile = json_encode($foto);

																						$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
																						echo 1;
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												} else {
													echo 5;
												}
											} else {
												echo 5;
											}
										} else {
											echo 5;
										}
									} else {
										echo 5;
									}
								} else {
									echo 5;
								}
							} else {
								echo 5;
							}
						} else {
							echo 5;
						}
					} else {
						echo 5;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Akta kematian dan KK
		elseif ($kategori == "Akta kematian dan KK") {
			if (!empty($_FILES['ktpk']['name']) && !empty($_FILES['kk']['name']) && !empty($_FILES['skmd']['name']) && !empty($_FILES['f107']['name'])  && !empty($_FILES['f101']['name'])) {

				if ($_FILES['ktpk']['type'] == "image/jpeg" || $_FILES['ktpk']['type'] == "image/png" || $_FILES['ktpk']['type'] == "image/bmp" || $_FILES['ktpk']['type'] == "image/jpg") {
					if ($_FILES['kk']['type'] == "image/jpeg" || $_FILES['kk']['type'] == "image/png" || $_FILES['kk']['type'] == "image/bmp" || $_FILES['kk']['type'] == "image/jpg") {
						if ($_FILES['skmd']['type'] == "image/jpeg" || $_FILES['skmd']['type'] == "image/png" || $_FILES['skmd']['type'] == "image/bmp" || $_FILES['skmd']['type'] == "image/jpg") {
							if ($_FILES['f107']['type'] == "image/jpeg" || $_FILES['f107']['type'] == "image/png" || $_FILES['f107']['type'] == "image/bmp" || $_FILES['f107']['type'] == "image/jpg") {
								if ($_FILES['f101']['type'] == "image/jpeg" || $_FILES['f101']['type'] == "image/png" || $_FILES['f101']['type'] == "image/bmp" || $_FILES['f101']['type'] == "image/jpg") {
									if ($this->upload->do_upload('ktpk')) {

										$uploadData = $this->upload->data();
										$ktpk = $uploadData['file_name'];;

										if ($this->upload->do_upload('kk')) {

											$uploadData = $this->upload->data();
											$kk = $uploadData['file_name'];

											if ($this->upload->do_upload('skmd')) {

												$uploadData = $this->upload->data();
												$skmd = $uploadData['file_name'];

												if ($this->upload->do_upload('f107')) {

													$uploadData = $this->upload->data();
													$f107 = $uploadData['file_name'];

													if ($this->upload->do_upload('f101')) {

														$uploadData = $this->upload->data();
														$f101 = $uploadData['file_name'];
														$foto = array(
															'ktpk' => $ktpk,
															'kk' => $kk,
															'skmd' => $skmd,
															'f107' => $f107,
															'f101' => $f101,
														);

														$jsonFile = json_encode($foto);

														$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
														echo 1;
													}
												}
											}
										}
									}
								} else {
									echo 5;
								}
							} else {
								echo 5;
							}
						} else {
							echo 5;
						}
					} else {
						echo 5;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Penerbitan kartu keluarga hilang / rusak
		elseif ($kategori == "Penerbitan kartu keluarga hilang / rusak") {
			if (!empty($_FILES['ktpayah']['name']) && !empty($_FILES['ktpibu']['name']) && !empty($_FILES['bukunikah']['name']) && !empty($_FILES['f107']['name'])  && !empty($_FILES['f102']['name'])) {

				if ($_FILES['ktpayah']['type'] == "image/jpeg" || $_FILES['ktpayah']['type'] == "image/png" || $_FILES['ktpayah']['type'] == "image/bmp" || $_FILES['ktpayah']['type'] == "image/jpg") {
					if ($_FILES['ktpibu']['type'] == "image/jpeg" || $_FILES['ktpibu']['type'] == "image/png" || $_FILES['ktpibu']['type'] == "image/bmp" || $_FILES['ktpibu']['type'] == "image/jpg") {
						if ($_FILES['bukunikah']['type'] == "image/jpeg" || $_FILES['bukunikah']['type'] == "image/png" || $_FILES['bukunikah']['type'] == "image/bmp" || $_FILES['bukunikah']['type'] == "image/jpg") {
							if ($_FILES['f107']['type'] == "image/jpeg" || $_FILES['f107']['type'] == "image/png" || $_FILES['f107']['type'] == "image/bmp" || $_FILES['f107']['type'] == "image/jpg") {
								if ($_FILES['f102']['type'] == "image/jpeg" || $_FILES['f102']['type'] == "image/png" || $_FILES['f102']['type'] == "image/bmp" || $_FILES['f102']['type'] == "image/jpg") {
									if ($this->upload->do_upload('ktpayah')) {

										$uploadData = $this->upload->data();
										$ktpayah = $uploadData['file_name'];;

										if ($this->upload->do_upload('ktpibu')) {

											$uploadData = $this->upload->data();
											$ktpibu = $uploadData['file_name'];

											if ($this->upload->do_upload('bukunikah')) {

												$uploadData = $this->upload->data();
												$bukunikah = $uploadData['file_name'];

												if ($this->upload->do_upload('f107')) {

													$uploadData = $this->upload->data();
													$f107 = $uploadData['file_name'];

													if ($this->upload->do_upload('f102')) {

														$uploadData = $this->upload->data();
														$f102 = $uploadData['file_name'];
														$foto = array(
															'ktpayah' => $ktpayah,
															'ktpibu' => $ktpibu,
															'bukunikah' => $bukunikah,
															'f107' => $f107,
															'f102' => $f102,
														);

														$jsonFile = json_encode($foto);

														$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
														echo 1;
													}
												}
											}
										}
									}
								} else {
									echo 5;
								}
							} else {
								echo 5;
							}
						} else {
							echo 5;
						}
					} else {
						echo 5;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}

		//Kartu keluarga baru
		elseif ($kategori == "Kartu keluarga baru") {
			if (!empty($_FILES['ktpayah']['name']) && !empty($_FILES['ktpibu']['name']) && !empty($_FILES['bukunikah']['name']) && !empty($_FILES['f107']['name'])  && !empty($_FILES['f105']['name']) && !empty($_FILES['f201']['name'])) {

				if ($_FILES['ktpayah']['type'] == "image/jpeg" || $_FILES['ktpayah']['type'] == "image/png" || $_FILES['ktpayah']['type'] == "image/bmp" || $_FILES['ktpayah']['type'] == "image/jpg") {
					if ($_FILES['ktpibu']['type'] == "image/jpeg" || $_FILES['ktpibu']['type'] == "image/png" || $_FILES['ktpibu']['type'] == "image/bmp" || $_FILES['ktpibu']['type'] == "image/jpg") {
						if ($_FILES['bukunikah']['type'] == "image/jpeg" || $_FILES['bukunikah']['type'] == "image/png" || $_FILES['bukunikah']['type'] == "image/bmp" || $_FILES['bukunikah']['type'] == "image/jpg") {
							if ($_FILES['f107']['type'] == "image/jpeg" || $_FILES['f107']['type'] == "image/png" || $_FILES['f107']['type'] == "image/bmp" || $_FILES['f107']['type'] == "image/jpg") {
								if ($_FILES['f105']['type'] == "image/jpeg" || $_FILES['f105']['type'] == "image/png" || $_FILES['f105']['type'] == "image/bmp" || $_FILES['f105']['type'] == "image/jpg") {
									if ($_FILES['f201']['type'] == "image/jpeg" || $_FILES['f201']['type'] == "image/png" || $_FILES['f201']['type'] == "image/bmp" || $_FILES['f201']['type'] == "image/jpg") {
										if ($this->upload->do_upload('ktpayah')) {

											$uploadData = $this->upload->data();
											$ktpayah = $uploadData['file_name'];;

											if ($this->upload->do_upload('ktpibu')) {

												$uploadData = $this->upload->data();
												$ktpibu = $uploadData['file_name'];

												if ($this->upload->do_upload('bukunikah')) {

													$uploadData = $this->upload->data();
													$bukunikah = $uploadData['file_name'];

													if ($this->upload->do_upload('f107')) {

														$uploadData = $this->upload->data();
														$f107 = $uploadData['file_name'];

														if ($this->upload->do_upload('f105')) {

															$uploadData = $this->upload->data();
															$f105 = $uploadData['file_name'];

															if ($this->upload->do_upload('f201')) {

																$uploadData = $this->upload->data();
																$f201 = $uploadData['file_name'];

																$foto = array(
																	'ktpayah' => $ktpayah,
																	'ktpibu' => $ktpibu,
																	'bukunikah' => $bukunikah,
																	'f107' => $f107,
																	'f105' => $f105,
																	'f201' => $f201,
																);

																$jsonFile = json_encode($foto);

																$this->pengajuan->addPengajuan($nama, $nik, $kategori, $jsonFile);
																echo 1;
															}
														}
													}
												}
											}
										}
									} else {
										echo 5;
									}
								} else {
									echo 5;
								}
							} else {
								echo 5;
							}
						} else {
							echo 5;
						}
					} else {
						echo 5;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}
	}
}
