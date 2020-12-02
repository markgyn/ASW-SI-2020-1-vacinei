package org.ufg.vacinei.service;

import org.ufg.vacinei.model.Vaccine;
import org.ufg.vacinei.view.VaccineDto;
import java.util.List;

public interface VaccineService {
	
	List<Vaccine> getVaccines();
	
	Vaccine createVaccine(VaccineDto vaccineDto);
	
	Vaccine getVaccine(Long vaccineId);
	
	List<Vaccine> getAvailableVaccines();
	
}
