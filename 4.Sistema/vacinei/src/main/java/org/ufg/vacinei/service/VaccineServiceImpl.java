package org.ufg.vacinei.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.ufg.vacinei.dao.repository.VaccineRepository;
import org.ufg.vacinei.model.Vaccine;
import org.ufg.vacinei.view.VaccineDto;
import java.time.LocalDate;
import java.util.Date;
import java.util.List;

@Service
public class VaccineServiceImpl implements VaccineService {
	
	private final VaccineRepository vaccineRepository;
	
	@Autowired
	public VaccineServiceImpl(VaccineRepository vaccineRepository) {
		this.vaccineRepository = vaccineRepository;
	}
	
	@Override
	public List<Vaccine> getVaccines() {
		return vaccineRepository.findAll();
	}
	
	@Override
	public Vaccine createVaccine(VaccineDto vaccineDto) {
		return vaccineRepository.save(vaccineDto.toVaccine());
	}
	
	@Override
	public Vaccine getVaccine(Long vaccineId) {
		return vaccineRepository.findById(vaccineId).orElseThrow();
	}
	
	@Override
	public List<Vaccine> getAvailableVaccines() {
		return vaccineRepository.findByAvailabilityDateAfter(new Date());
	}
	
}
