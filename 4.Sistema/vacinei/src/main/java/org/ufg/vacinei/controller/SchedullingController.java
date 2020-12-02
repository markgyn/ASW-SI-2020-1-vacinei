package org.ufg.vacinei.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.ufg.vacinei.model.Schedule;
import org.ufg.vacinei.service.ScheduleService;
import org.ufg.vacinei.view.ScheduleDto;
import java.security.Principal;
import java.util.List;
import java.util.stream.Collectors;

@RestController()
@RequestMapping(path = "schedule")
public class SchedullingController {
	
	private final ScheduleService scheduleService;
	
	@Autowired
	public SchedullingController(ScheduleService scheduleService) {
		this.scheduleService = scheduleService;
	}
	
	@GetMapping
	public List<ScheduleDto> getSchedules() {
		return scheduleService.getSchedulesForUser().stream().map(ScheduleDto::new).collect(Collectors.toList());
	}
	
	@PostMapping
	public ResponseEntity<ScheduleDto> scheduleVaccine(@RequestBody  ScheduleDto scheduleDto) {
		Schedule schedule = scheduleService.scheduleDtoToEntity(scheduleDto);
		return ResponseEntity.ok(new ScheduleDto(scheduleService.scheduleVaccine(schedule)));
	}
	
	@PutMapping
	public ResponseEntity<Schedule> editSchedule(@RequestBody  ScheduleDto scheduleDto) {
		Schedule schedule = scheduleService.scheduleDtoToEntity(scheduleDto);
		return ResponseEntity.ok(scheduleService.updateSchedule(schedule));
	}
	
}
