package org.ufg.vacinei.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.ufg.vacinei.model.Vaccine;
import org.ufg.vacinei.service.VaccineService;
import org.ufg.vacinei.view.VaccineDto;
import java.util.List;

@RestController()
@RequestMapping(path = "vaccine")
public class VaccineController {
	
	private final VaccineService vaccineService;
	
	@Autowired
	public VaccineController(VaccineService vaccineService) {
		this.vaccineService = vaccineService;
	}
	
	@GetMapping
	public List<Vaccine> getVaccines() {
		return vaccineService.getVaccines();
	}
	
	@GetMapping("available")
	public List<Vaccine> getAvailableVaccines() {
		return vaccineService.getAvailableVaccines();
	}
	
	@PostMapping
	public ResponseEntity<VaccineDto> createVaccine(@RequestBody VaccineDto vaccineDto) {
		return ResponseEntity.ok(new VaccineDto(vaccineService.createVaccine(vaccineDto)));
	}
	
}
